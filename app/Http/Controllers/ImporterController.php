<?php

namespace App\Http\Controllers;

use App\Data\Joomla\Asset;
use App\Data\Joomla\ContentItemTagMap;
use Carbon\Carbon;
use \DB;
use App\Data\Joomla\Content;
use App\Data\Quero\Publicacao;
use App\Data\Joomla\ContentType;
use App\Data\Joomla\Tag;
use App\Http\Controllers\Controller;

class ImporterController extends Controller
{
	private $numbers = [];

	public function import()
	{
		DB::beginTransaction();

		foreach (Publicacao::all() as $publicacao)
		{
			// $publicacao = $this->createContent(Publicacao::where('publicacaoId', 2679)->first());
//			dd($publicacao);

			$this->createContent($publicacao);
		}

		DB::commit();

		return 'SUCESSO!';
	}

	private function createContent($publicacao)
	{
		$content = new Content();

		$content->title = $publicacao->tituloPublicacao ?: 'title';
		$content->alias = str_slug($content->title);
		$content->alias = $content->alias ?: '';
		$content->introtext = $publicacao->trechoEmDestaque ?: '';
		$content->fulltext = $this->createFullText(
			$publicacao->publicacao,
			[
				$publicacao->urlYouTube,
				$publicacao->urlYouTube2,
				$publicacao->urlYouTube3,
				$publicacao->urlYouTube4,
				$publicacao->urlYouTube5,
			]
		);

		$content->state = 1;

		$content->catid = 85;

		$content->created = $publicacao->dataHoraPublicacao;
		$content->created_by = 545;
		$content->created_by_alias = 'olala';

		$content->publish_up = $publicacao->inicioPub;

		$content->images = $this->createPhotoUrl($publicacao->urlFoto1, $publicacao->creditoFoto1, $publicacao->alinhamentoFoto1);

		$content->attribs = '{}';

		$content->version = 1;

		$content->ordering = 0;
		$content->access = 1;
		$content->hits = 0;
		$content->metadata = '{"robots":"","author":"","rights":"","xreference":""}';
		$content->featured = $publicacao->destaquePublicacao;
		$content->language = 'pt-BR';

		$content->save();

		$this->createTags($content, $publicacao);

		$asset = $this->createAsset($content);

		$content->asset_id = $asset->id;

		$content->save();

		return ContentType::where('type_title', 'Article')->first();

		return Content::first();
	}

	private function createFullText($publicacao, $videos)
	{
		foreach ($videos as $video)
		{
			if ($video)
			{
				$publicacao .= '<br>' . '<iframe width="560" height="315" src="https://www.youtube.com/embed/'.$video.'" frameborder="0" allowfullscreen></iframe>';
			}
		}

		foreach (range(2,5) as $index)
		{
			if (isset($publicacao['urlFoto'.$index]))
			{
				$publicacao .= '<br>' . '<img src="'.$publicacao['urlFoto'.$index].'">'.$publicacao['creditoFoto'.$index];
			}
		}

		return $publicacao ?: '';
	}

	private function createPhotoUrl($photo, $credit, $alignment)
	{
		if (! $photo)
		{
			return '{}';
		}

		return '{
			"image_intro":"images\/articles\/'.$photo.'",
			"float_intro":"left",
			"image_intro_alt":"imagem",
			"image_intro_caption":"'.$credit.'",
			"image_fulltext":"images\/articles\/'.$photo.'",
			"float_fulltext":"'.$alignment.'",
			"image_fulltext_alt":"imagem",
			"image_fulltext_caption":"'.$credit.'"
		}';
	}

	private function createTags($content, $publicacao)
	{
		$sections = [
			'Geral' => $publicacao->areaG,
			'Agronegócio' => $publicacao->areaA,
			'Infraestrutura e Logística' => $publicacao->areaI,
			'Desenvolvimento Sustentável' => $publicacao->areaS,
			'Economia Criativa' => $publicacao->areaE,
			'Energia' => $publicacao->areaN,
			'Gestão e Políticas Públicas' => $publicacao->areaR,
			'Tecnologia' => $publicacao->areaU,
			'Economia Criativa' => $publicacao->areaB,
			'Economia Criativa' => $publicacao->areaE,
			'Economia Criativa' => $publicacao->areaT,
		];

		$tags = [];

		foreach ($sections as $section => $isPresent)
		{
			if ($isPresent)
			{
				$tags[] = $this->searchTag($section);
			}
		}

		$index = $this->getNextIndex('core_content_id');

		foreach ($tags as $tag)
		{
			$tagMap = new ContentItemTagMap();

			$tagMap->type_alias = 'com_content.article';
			$tagMap->core_content_id = $index;
			$tagMap->content_item_id = $content->id;
			$tagMap->tag_id = $tag->id;
			$tagMap->tag_date = Carbon::now();
			$tagMap->type_id = 1;

			$tagMap->save();
		}
	}

	private function searchTag($section)
	{
		Tag::unguard();

		$tag = Tag::where('title', $section)->first();

		if ( ! $tag)
		{
			$tag = Tag::firstOrCreate([
				'lft' => $this->getNextIndex('rightleft'),
				'rgt' => $this->getNextIndex('rightleft'),
			    'level' => 1,
			    'path' => str_slug($section),
			    'title' => $section,
			    'alias' => str_slug($section),
			    'checked_out' => 0,
				'checked_out' => Carbon::now(),
			    'access' => 1,
			    'params' => '{}',
				'metadata' => '{}',
				'created_user_id' => 42,
				'created_time' => Carbon::now(),
			    'modified_user_id' => 0,
			    'images' => '{}',
				'urls' => '{}',
				'hits' => 0,
				'language' => '*',
				'version' => 1,
				'publish_up' => Carbon::now(),
				'publish_down' => Carbon::now(),
			]);
		}

		return $tag;
	}

	private function getNextIndex($index)
	{
		$number = isset($this->numbers[$index]) ? $this->numbers[$index] : 0;

		$number++;

		$this->numbers[$index] = $number;

		return $number;
	}

	private function createAsset($content)
	{
		$asset = new Asset();

		$asset->parent_id = 403;
		$asset->lft = $this->getNextIndex('rightleft_asset');
		$asset->rgt = $this->getNextIndex('rightleft_asset');
		$asset->level = 3;
		$asset->name = 'com_content.article.'.$content->id;
		$asset->title = $content->title;
		$asset->rules = '{}';

		$asset->save();

		return $asset;
	}
}
