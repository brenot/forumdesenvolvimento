ALTER TABLE `#__youtubegallery_videos` ADD COLUMN `likes` int(11) NOT NULL default 0;
ALTER TABLE `#__youtubegallery_videos` ADD COLUMN `dislikes`int(11) NOT NULL default 0;
ALTER TABLE `#__youtubegallery_videos` ADD COLUMN `commentcount`int(11) NOT NULL default 0;
ALTER TABLE `#__youtubegallery_videos` ADD COLUMN `channel_username` varchar(255) NOT NULL;
ALTER TABLE `#__youtubegallery_videos` ADD COLUMN `channel_title` varchar(255) NOT NULL;
ALTER TABLE `#__youtubegallery_videos` ADD COLUMN `channel_subscribers` int(11) NOT NULL default 0;
ALTER TABLE `#__youtubegallery_videos` ADD COLUMN `channel_subscribed` smallint(6) NOT NULL default 0;
ALTER TABLE `#__youtubegallery_videos` ADD COLUMN `channel_location` varchar(5) NOT NULL;
ALTER TABLE `#__youtubegallery_videos` ADD COLUMN `channel_commentcount` int(11) NOT NULL default 0;
ALTER TABLE `#__youtubegallery_videos` ADD COLUMN `channel_viewcount` int(11) NOT NULL default 0;
ALTER TABLE `#__youtubegallery_videos` ADD COLUMN `channel_videocount` int(11) NOT NULL default 0;
ALTER TABLE `#__youtubegallery_videos` ADD COLUMN `channel_description` text NOT NULL;
