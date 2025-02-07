/*! Image Uploader - v1.0.0 - 15/07/2019
 * Copyright (c) 2019 Christian Bayer; Licensed MIT */(function(n){n.fn.imageUploader=function(m){let h={preloaded:[],imagesInputName:"images",preloadedInputName:"preloaded",label:""},a=this;a.settings={},a.init=function(){a.settings=n.extend(a.settings,h,m),a.each(function(t,i){let e=x();if(n(i).append(e),e.on("dragover",c.bind(e)),e.on("dragleave",c.bind(e)),e.on("drop",f.bind(e)),a.settings.preloaded.length){e.addClass("has-files");let o=e.find(".uploaded");for(let s=0;s<a.settings.preloaded.length;s++)o.append(r(a.settings.preloaded[s].src,a.settings.preloaded[s].id))}})};let d=new DataTransfer,v='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>',w='<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M288 109.3V352c0 17.7-14.3 32-32 32s-32-14.3-32-32V109.3l-73.4 73.4c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3l128-128c12.5-12.5 32.8-12.5 45.3 0l128 128c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L288 109.3zM64 352H192c0 35.3 28.7 64 64 64s64-28.7 64-64H448c35.3 0 64 28.7 64 64v32c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V416c0-35.3 28.7-64 64-64zM432 456a24 24 0 1 0 0-48 24 24 0 1 0 0 48z"/></svg>',x=function(){let t=n("<div>",{class:"image-uploader"}),i=n("<input>",{type:"file",id:a.settings.imagesInputName+"-"+C(),name:a.settings.imagesInputName+"[]",multiple:""}).appendTo(t);n("<div>",{class:"uploaded"}).appendTo(t);let e=n("<div>",{class:"upload-text"}).appendTo(t);return n(w).appendTo(e),n("<span>",{text:a.settings.label}).appendTo(e),t.on("click",function(o){p(o),i.trigger("click")}),i.on("click",function(o){o.stopPropagation()}),i.on("change",f.bind(t)),t},p=function(t){t.preventDefault(),t.stopPropagation()},r=function(t,i){let e=n("<div>",{class:"uploaded-image"});n("<img>",{src:t}).appendTo(e);let o=n("<button>",{class:"delete-image"}).appendTo(e),s=n(v).appendTo(o);return s=s.appendTo(o),a.settings.preloaded.length?(e.attr("data-preloaded",!0),n("<input>",{type:"hidden",name:a.settings.preloadedInputName+"[]",value:i}).appendTo(e)):e.attr("data-index",i),e.on("click",function(l){p(l)}),o.on("click",function(l){if(p(l),e.data("index")){let g=parseInt(e.data("index"));e.find(".uploaded-image[data-index]").each(function(u,I){u>g&&n(I).attr("data-index",u-1)}),d.items.remove(g);let b=d.files;$input=n('input[type="file"]'),$input.prop("files",b)}e.remove(),e.find(".uploaded-image").length||e.removeClass("has-files")}),e},c=function(t){p(t),t.type==="dragover"?n(this).addClass("drag-over"):n(this).removeClass("drag-over")},f=function(t){p(t);let i=n(this);i.removeClass("drag-over");let e=t.target.files||t.originalEvent.dataTransfer.files;T(i,e)},T=function(t,i){t.addClass("has-files");let e=t.find(".uploaded"),o=t.find('input[type="file"]');n(i).each(function(s,l){d.items.add(l),e.append(r(URL.createObjectURL(l),d.items.length-1))}),o.prop("files",d.files)},C=function(){return Date.now()+Math.floor(Math.random()*100+1)};return this.init(),this}})(jQuery);
