

/*===============================
/templates/uber/acm/header/js/script.js
================================================================================*/;
+function($){'use strict';var Affix=function(element,options){this.options=$.extend({},Affix.DEFAULTS,options)
this.$target=$(this.options.target).on('scroll.bs.affix.data-api',$.proxy(this.checkPosition,this)).on('click.bs.affix.data-api',$.proxy(this.checkPositionWithEventLoop,this))
this.$element=$(element)
this.affixed=this.unpin=this.pinnedOffset=null
this.checkPosition()}
Affix.VERSION='3.2.0'
Affix.RESET='affix affix-top affix-bottom'
Affix.DEFAULTS={offset:0,target:window}
Affix.prototype.getPinnedOffset=function(){if(this.pinnedOffset)return this.pinnedOffset
this.$element.removeClass(Affix.RESET).addClass('affix')
var scrollTop=this.$target.scrollTop()
var position=this.$element.offset()
return(this.pinnedOffset=position.top-scrollTop)}
Affix.prototype.checkPositionWithEventLoop=function(){setTimeout($.proxy(this.checkPosition,this),1)}
Affix.prototype.checkPosition=function(){if(!this.$element.is(':visible'))return
var scrollHeight=$(document).height()
var scrollTop=this.$target.scrollTop()
var position=this.$element.offset()
var offset=this.options.offset
var offsetTop=offset.top
var offsetBottom=offset.bottom
if(typeof offset!='object')offsetBottom=offsetTop=offset
if(typeof offsetTop=='function')offsetTop=offset.top(this.$element)
if(typeof offsetBottom=='function')offsetBottom=offset.bottom(this.$element)
var affix=this.unpin!=null&&(scrollTop+this.unpin<=position.top)?false:offsetBottom!=null&&(position.top+this.$element.height()>=scrollHeight-offsetBottom)?'bottom':offsetTop!=null&&(scrollTop<=offsetTop)?'top':false
if(this.affixed===affix)return
if(this.unpin!=null)this.$element.css('top','')
var affixType='affix'+(affix?'-'+affix:'')
var e=$.Event(affixType+'.bs.affix')
this.$element.trigger(e)
if(e.isDefaultPrevented())return
this.affixed=affix
this.unpin=affix=='bottom'?this.getPinnedOffset():null
this.$element.removeClass(Affix.RESET).addClass(affixType).trigger($.Event(affixType.replace('affix','affixed')))
if(affix=='bottom'){this.$element.offset({top:scrollHeight-this.$element.height()-offsetBottom})}}
function Plugin(option){return this.each(function(){var $this=$(this)
var data=$this.data('bs.affix')
var options=typeof option=='object'&&option
if(!data)$this.data('bs.affix',(data=new Affix(this,options)))
if(typeof option=='string')data[option]()})}
var old=$.fn.affix
$.fn.affix=Plugin
$.fn.affix.Constructor=Affix
$.fn.affix.noConflict=function(){$.fn.affix=old
return this}
$(window).on('load',function(){$('[data-spy="affix"]').each(function(){var $spy=$(this)
var data=$spy.data()
data.offset=data.offset||{}
if(data.offsetBottom)data.offset.bottom=data.offsetBottom
if(data.offsetTop)data.offset.top=data.offsetTop
Plugin.call($spy,data)})})}(jQuery);


/*===============================
/media/system/js/html5fallback.js
================================================================================*/;
!function(a,b,c){"function"!=typeof Object.create&&(Object.create=function(a){function b(){}return b.prototype=a,new b});var d={init:function(c,d){var e=this;e.elem=d,e.$elem=a(d),d.H5Form=e,e.options=a.extend({},a.fn.h5f.options,c),e.field=b.createElement("input"),e.checkSupport(e),"form"===d.nodeName.toLowerCase()&&e.bindWithForm(e.elem,e.$elem)},bindWithForm:function(a,b){var d=this,e=!!b.attr("novalidate"),f=a.elements,g=f.length;for("onSubmit"===d.options.formValidationEvent&&b.on("submit",function(a){var f=this.H5Form.donotValidate!=c?this.H5Form.donotValidate:!1;f||e||d.validateForm(d)?b.find(":input").each(function(){d.placeholder(d,this,"submit")}):(a.preventDefault(),this.donotValidate=!1)}),b.on("focusout focusin",function(a){d.placeholder(d,a.target,a.type)}),b.on("focusout change",d.validateField),b.find("fieldset").on("change",function(){d.validateField(this)}),d.browser.isFormnovalidateNative||b.find(":submit[formnovalidate]").on("click",function(){d.donotValidate=!0});g--;){var h=f[g];d.polyfill(h),d.autofocus(d,h)}},polyfill:function(a){if("form"===a.nodeName.toLowerCase())return!0;var b=a.form.H5Form;b.placeholder(b,a),b.numberType(b,a)},checkSupport:function(a){a.browser={},a.browser.isRequiredNative=!!("required"in a.field),a.browser.isPatternNative=!!("pattern"in a.field),a.browser.isPlaceholderNative=!!("placeholder"in a.field),a.browser.isAutofocusNative=!!("autofocus"in a.field),a.browser.isFormnovalidateNative=!!("formnovalidate"in a.field),a.field.setAttribute("type","email"),a.browser.isEmailNative="email"==a.field.type,a.field.setAttribute("type","url"),a.browser.isUrlNative="url"==a.field.type,a.field.setAttribute("type","number"),a.browser.isNumberNative="number"==a.field.type,a.field.setAttribute("type","range"),a.browser.isRangeNative="range"==a.field.type},validateForm:function(){var a=this,b=a.elem,c=b.elements,d=c.length,e=!0;b.isValid=!0;for(var f=0;d>f;f++){var g=c[f];g.isRequired=!!g.required,g.isDisabled=!!g.disabled,g.isDisabled||(e=a.validateField(g),b.isValid&&!e&&a.setFocusOn(g),b.isValid=e&&b.isValid)}return a.options.doRenderMessage&&a.renderErrorMessages(a,b),b.isValid},validateField:function(b){var d=b.target||b;if(d.form===c)return null;{var e=d.form.H5Form,f=a(d),g=!1,h=!!a(d).attr("required");!!f.attr("disabled")}if(d.isDisabled||(g=!e.browser.isRequiredNative&&h&&e.isValueMissing(e,d),isPatternMismatched=!e.browser.isPatternNative&&e.matchPattern(e,d)),d.validityState={valueMissing:g,patterMismatch:isPatternMismatched,valid:d.isDisabled||!(g||isPatternMismatched)},e.browser.isRequiredNative||(d.validityState.valueMissing?f.addClass(e.options.requiredClass):f.removeClass(e.options.requiredClass)),e.browser.isPatternNative||(d.validityState.patterMismatch?f.addClass(e.options.patternClass):f.removeClass(e.options.patternClass)),d.validityState.valid){f.removeClass(e.options.invalidClass);var i=e.findLabel(f);i.removeClass(e.options.invalidClass)}else{f.addClass(e.options.invalidClass);var i=e.findLabel(f);i.addClass(e.options.invalidClass)}return d.validityState.valid},isValueMissing:function(d,e){var f=a(e),g=/^submit$/i,h=f.val(),i=e.type!==c?e.type:e.tagName.toLowerCase(),j=/^(checkbox|radio|fieldset)$/i;if(j.test(i)||g.test(i)){if(j.test(i)){if("checkbox"===i)return!f.is(":checked");var k;k="fieldset"===i?f.find("input"):b.getElementsByName(e.name);for(var l=0;l<k.length;l++)if(a(k[l]).is(":checked"))return!1;return!0}}else{if(""===h)return!0;if(!d.browser.isPlaceholderNative&&f.hasClass(d.options.placeholderClass))return!0}return!1},matchPattern:function(b,d){var e=a(d),f=!b.browser.isPlaceholderNative&&e.attr("placeholder")&&e.hasClass(b.options.placeholderClass)?"":e.attr("value"),g=e.attr("pattern"),h=e.attr("type");if(""!==f)if("email"===h){var i=!0;if(e.attr("multiple")===c)return!b.options.emailPatt.test(f);f=f.split(b.options.mutipleDelimiter);for(var j=0;j<f.length;j++)if(i=b.options.emailPatt.test(f[j].replace(/[ ]*/g,"")),!i)return!0}else{if("url"===h)return!b.options.urlPatt.test(f);if("text"===h&&g!==c)return usrPatt=new RegExp("^(?:"+g+")$"),!usrPatt.test(f)}return!1},placeholder:function(b,d,e){var f=a(d),g={placeholder:f.attr("placeholder")},h=/^(focusin|submit)$/i,i=/^(input|textarea)$/i,j=/^password$/i,k=b.browser.isPlaceholderNative;k||!i.test(d.nodeName)||j.test(d.type)||g.placeholder===c||(""!==d.value||h.test(e)?d.value===g.placeholder&&h.test(e)&&(d.value="",f.removeClass(b.options.placeholderClass)):(d.value=g.placeholder,f.addClass(b.options.placeholderClass)))},numberType:function(b,c){var d=a(c);if(node=/^input$/i,type=d.attr("type"),node.test(c.nodeName)&&("number"==type&&!b.browser.isNumberNative||"range"==type&&!b.browser.isRangeNative)){var e,f=parseInt(d.attr("min")),g=parseInt(d.attr("max")),h=parseInt(d.attr("step")),i=parseInt(d.attr("value")),j=d.prop("attributes"),k=a("<select>");f=isNaN(f)?-100:f;for(var l=f;g>=l;l+=h)e=a("<option>").attr("value",l).text(l),(i==l||i>l&&l+h>i)&&e.attr("selected",""),k.append(e);a.each(j,function(){k.attr(this.name,this.value)}),d.replaceWith(k)}},autofocus:function(c,d){var e=a(d),f=!!e.attr("autofocus"),g=/^(input|textarea|select|fieldset)$/i,h=/^submit$/i,i=c.browser.isAutofocusNative;!i&&g.test(d.nodeName)&&!h.test(d.type)&&f&&a(b).ready(function(){c.setFocusOn(d)})},findLabel:function(b){var c=a('label[for="'+b.attr("id")+'"]');if(c.length<=0){var d=b.parent(),e=d.get(0).tagName.toLowerCase();"label"==e&&(c=d)}return c},setFocusOn:function(b){"fieldset"===b.tagName.toLowerCase()?a(b).find(":first").focus():a(b).focus()},renderErrorMessages:function(b,c){var d=c.elements,e=d.length,f={};for(f.errors=new Array;e--;){var g=a(d[e]),h=b.findLabel(g);g.hasClass(b.options.requiredClass)&&(f.errors[e]=h.text().replace("*","")+b.options.requiredMessage),g.hasClass(b.options.patternClass)&&(f.errors[e]=h.text().replace("*","")+b.options.patternMessage)}f.errors.length>0&&Joomla.renderMessages(f)}};a.fn.h5f=function(a){return this.each(function(){var b=Object.create(d);b.init(a,this)})},a.fn.h5f.options={invalidClass:"invalid",requiredClass:"required",requiredMessage:" is required.",placeholderClass:"placeholder",patternClass:"pattern",patternMessage:" doesn't match pattern.",doRenderMessage:!1,formValidationEvent:"onSubmit",emailPatt:/^[a-zA-Z0-9.!#$%&‚Äô*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/,urlPatt:/[a-z][\-\.+a-z]*:\/\//i},a(function(){a("form").h5f({doRenderMessage:!0,requiredClass:"musthavevalue"})})}(jQuery,document);