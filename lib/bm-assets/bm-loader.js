jQuery(document).ready(function($) {

  let copy_html = '<button class="copy_text_btn"><i class="far fa-copy"></i>Copy</button>';

  $(document).on('click', '.copy_text_btn2', function(e) {
    let $element = $(this).prev(".gbl-code");
    $element.focus();
    $element[0].setSelectionRange(0, $element.val().length);
    document.execCommand("copy");
  });

  $(document).on('click', '.copy_text_btn', function(e) {
    let $element = $(this).prev(".gbl-code");
    let $temp = $("<input>");
    $temp.css({"position": "absolute", "left": $element.offset().left + "px", "top": $element.offset().top + "px"});
    $("body").append($temp);
    $temp.val($element.text());
    $temp.focus();
    $temp[0].setSelectionRange(0, $temp.val().length);
    document.execCommand("copy");
    $temp.remove();
  });

  $("#build_bookmarklet").click(function(e) {
    let $item = $('#gbl_advertisers');
		let id = $('#linkshare_id').val();
    let mid = $('option:selected', $item).attr('data-id');
    let u1 = $('#u1_description').val();

    if (id === '') { alert('Please enter Linkshare ID'); return; }
    if ($item.val() === '') { alert('Please select Advertiser'); return; }

    if (u1 !== '') {
      link = `https://click.linksynergy.com/deeplink?id=${id}&mid=${mid}&u1=${u1}&murl=`;
    } else {
      link = `https://click.linksynergy.com/deeplink?id=${id}&mid=${mid}&murl=`;
    }

    let result = `javascript:(function(){function __bmLoader() { var win = window.open("", "", "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,titlebar=no,width=780,height=200,top="+(screen.height-400)+",left="+(screen.width-840)); var link = '${link}' + location.href; win.document.title='Bookmarklet';win.document.body.innerHTML="<a href='"+link+"'>"+link+"</a>"; return false; } __bmLoader();})()`;

    let result2 = `javascript:(function(){function __b(){var w=window.open("","","toolbar=yes,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,titlebar=no,width=780,height=200,top="+(screen.height-400)+",left="+(screen.width-840));var l='${link}'+location.href;w.document.write('<html><head><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" ><title>Glohbal Bookmarklet!</title><link rel="stylesheet" type="text/css" href="//glohbalstyle.com/wp-content/themes/mcluhan-child/lib/bm-assets/bookmarklet.css?'+new Date().getTime()+'"></head><body><a id="alink" href="'+l+'">'+l+'</a><script src="//glohbalstyle.com/wp-content/themes/mcluhan-child/lib/bm-assets/bookmarklet.js?'+new Date().getTime()+'"></script></body></html>');return false;}__b();})()`;

    $('#gbl_result_bookmarklet').html('<p class="gbl-code"></p>' + copy_html);
    $('#gbl_result_bookmarklet > .gbl-code').text(result2);
  });


  $("#build_url").click(function(e) {
    let $item = $('#gbl_advertisers');
		let id = $('#linkshare_id').val();
    let mid = $('option:selected', $item).attr('data-id');
    let murl = $('#murl').val();
    let u1 = $('#u1_description').val();

    if (id === '') { alert('Please enter Linkshare ID'); return; }
    if ($item.val() === '') { alert('Please select Advertiser'); return; }

    if (u1 !== '') {
      link = `https://click.linksynergy.com/deeplink?id=${id}&mid=${mid}&u1=${u1}&murl=${murl}`;
    } else {
      link = `https://click.linksynergy.com/deeplink?id=${id}&mid=${mid}&murl=${murl}`;
    }

    $('#gbl_result_url').html(`<p class="gbl-code">${link}</p>` + copy_html);
  });

  $("#build_skim_bookmarklet").click(function(e) {
		let id = $('#skimlinks_id').val();
    let xcust = $('#xcust').val();

    if (id === '') { alert('Please enter Skimlinks ID'); return; }

    if (xcust !== '') {
      link = `https://go.skimresources.com?id=${id}&xs=1&xcust=${xcust}&url=`;
    } else {
      link = `https://go.skimresources.com?id=${id}&xs=1&url=`;
    }

    let result = `javascript:(function(){function __bmLoader() { var win = window.open("", "", "toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,titlebar=no,width=780,height=200,top="+(screen.height-400)+",left="+(screen.width-840)); var link = '${link}' + location.href; win.document.title='Bookmarklet';win.document.body.innerHTML="<a href='"+link+"'>"+link+"</a>"; return false; } __bmLoader();})()`;

    let result2 = `javascript:(function(){function __b(){var w=window.open("","","toolbar=yes,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,titlebar=no,width=780,height=200,top="+(screen.height-400)+",left="+(screen.width-840));var l='${link}'+location.href;w.document.write('<html><head><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" ><title>Glohbal Bookmarklet!</title><link rel="stylesheet" type="text/css" href="//glohbalstyle.com/wp-content/themes/mcluhan-child/lib/bm-assets/bookmarklet.css?'+new Date().getTime()+'"></head><body><a id="alink" href="'+l+'">'+l+'</a><script src="//glohbalstyle.com/wp-content/themes/mcluhan-child/lib/bm-assets/bookmarklet.js?'+new Date().getTime()+'"></script></body></html>');return false;}__b();})()`;

    $('#gbl_result_bookmarklet').html('<p class="gbl-code"></p>' + copy_html);
    $('#gbl_result_bookmarklet > .gbl-code').text(result2);
    $("#gbl_result_message").text("Success :) Your affiliate link is created below. Copy and share.").show();
  });


  $("#build_skim_url").click(function(e) {
    let $item = $('#gbl_advertisers');
		let id = $('#linkshare_id').val();
    let mid = $('option:selected', $item).attr('data-id');
    let murl = $('#murl').val();
    let u1 = $('#u1_description').val();

    if (id === '') { alert('Please enter Linkshare ID'); return; }
    if ($item.val() === '') { alert('Please select Advertiser'); return; }

    if (u1 !== '') {
      link = `https://click.linksynergy.com/deeplink?id=${id}&mid=${mid}&u1=${u1}&murl=${murl}`;
    } else {
      link = `https://click.linksynergy.com/deeplink?id=${id}&mid=${mid}&murl=${murl}`;
    }

    $('#gbl_result_url').html(`<p class="gbl-code">${link}</p>` + copy_html);
  });
});