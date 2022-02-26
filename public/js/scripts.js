
// utility functions
function showLoader() {
    var gt = gLoader;
    $('#' + gt).css({display: 'table'});
}

function hideLoader() {
    var gt = gLoader;
    $('#' + gt).css({display: 'none'});
}

function renderPartialPages(domId) {
    if (typeof domId != 'undefined') {
        var dom = $('#' + domId);
        var pageParts = $(dom).find('[data-page-part]');
        if ($(pageParts).length) {
            $(pageParts).each(function () {
                var id = $(this).attr('id');
                var url = $(this).attr('data-page-part');
                loadPage(url, id);
            });
        }
    }
}

//function that replaces all src tags to data-oassrc
function replaceAttributes(text, search, value) {
    if (text.indexOf(search) != -1) {
        var val = search + '"" ' + value;
        var res = text.replace(search, val);
        return res;
    }
    return text;

}

function setAttributes(dom, search, value) {
    var targetDoms = $(dom).find("[" + search + "]");
    if ($(targetDoms).length) {
        $(targetDoms).each(function () {
            var attValue = $(this).attr(search);
            $(this).attr(value, attValue);
        });
    }
}
/*
 * load page or pages
 * for single page
 */

function loadPageFull(url, domId) {
    var dom = $('#' + domId);
    if ($('#' + domId).length == 0) {
        alert('Container not Found.');
    }
    if (url.lenth <= 7) {
        alert('No url Provided.');
    }
    var xhr = $.ajax({
        url: url
    });
    xhr.done(function (data) {
        var rawHtml = data;
        var html = replaceAttributes(rawHtml, 'src=', 'data-oassrc=');
        $(dom).html('');
        $(dom).html(html);
        $(dom).hide().fadeIn(500);
        setAttributes(dom, 'data-oassrc', 'src');
        renderPartialPages(domId);
    });
    xhr.fail(function () {
        alert('Error on loading page.');
    });
}

//load page with partial url
function loadPage(partUrl, domId) {
    var url = makeUrl(partUrl);
    loadPageFull(url, domId);
}

// function takes response and then creates pagination
function createPagination(resp,path) {

    var cp = resp.current_page;
    var lp = resp.last_page;
    var linkSelect = $("body #pagings ul");
    var activeLink = parseInt(linkSelect.find("li.active").text());
    linkSelect.find("li.active").removeClass("active");

    $("body #pagings ul li").remove();
    var lAdjuster = 0;
    var uAdjuster = 0;
    if (cp > 1) {
        lAdjuster = cp > 5 ? 5 : cp - 1;
    }
    if (lp > cp) {
        uAdjuster = (lp - cp) > 5 ? 5 : (lp - cp);

    }
    for (var i = cp - lAdjuster; i <= cp + uAdjuster; i++)
    {
        linkSelect.append("<li><a href='javascript:void(0)' onclick=\"pages(event," + lp + ",'" + path.toString() +"')\">" + i + "</a></li>");

    }
    if (activeLink == 0) {

        linkSelect.find("li:eq(1)").addClass("active");

    } else {
        linkSelect.children().find("a:contains(" + resp.current_page + ")").filter(function () {

            return $(this).text() == resp.current_page;
        }).parent().addClass("active");
    }
    var activeLink = parseInt(linkSelect.find("li.active").text());
    if (activeLink != 1) {
        linkSelect.prepend("<li><a href='javascript:void(0)' onclick=\"pages(event," + lp + ",'" + path.toString() +"' )\">Prev</a></li>");
    } else {
        linkSelect.prepend("<li><a href='javascript:void(0)' onclick=\"pages(event," + lp + ",'" + path.toString() +"')\">Prev</a></li>");
    }
    if (activeLink != resp.last_page) {
        linkSelect.append("<li><a href='javascript:void(0)' onclick=\"pages(event," + lp + ",'" + path.toString() +"')\">Next</a></li>");
    } else {
        linkSelect.append("<li><a href='javascript:void(0)' onclick=\"pages(event," + lp + ",'" + path.toString() +"' )\">Next</a></li>");
    }
    if (lAdjuster == 5) {
        linkSelect.prepend("<li><a href='javascript:void(0)' onclick=\"pages(event," + lp + ",'" + path.toString() +"')\">1</a></li>");

    }
    if (uAdjuster == 5) {
        linkSelect.append("<li><a href='javascript:void(0)' onclick=\"pages(event," + lp + ",'" + path.toString() +"')\">" + lp + "</a></li>");
    }
    if (resp.from == null && resp.to == null) {
        var info = "<div id='entriesinfo' style='float:left'>No Records Found.</div>"
        $('body #table #entriesinfo').empty();
        $("#table").append(info);
    } else {
        var info = "<div id='entriesinfo' style='float:left'>Showing " + resp.from + " to " + resp.to + " from " + resp.total + " entries.</div>"
        $('body #table #entriesinfo').empty();
        $("#table").append(info);
    }
    return true;
}

function pages(e, last,path) {
        e.preventDefault();
        var entry = $("#selectentry").val();
        var page = e.target.text;
        var index = $("body #pagings ul li.active").text();
        if (page === "Prev") {

            if (index == "1") {
                return true;
            } else {
                index--;

                page = index;
            }
        }
        if (page === "Next") {
            if (index == last) {
                return true;
            } else {
                index++;

                page = index;
            }
        }
       $.ajax({

    method:'get',
    url:baseUrl+"/"+path+"/list?entry="+entry+"&page="+page+"&search="+$("#searchfill").val(),
    success:function(response){
        // createTable(response);
       createNotices(response);


    },
    fail:function(){
        alert("failed");
    }
});
 

    }

// assign value to the form inputs
function assignValues(obj) {
    if (typeof obj == 'object') {
        for (var i in obj) {
            if ($('#' + i).length) {
                $('#' + i).val(obj[i]);
            }
        }
    }
}

// empties the options of dropdown
function emptySelection(ids) {
    if (Array.isArray(ids)) {
        for (var i in ids) {
            $('#' + ids[i]).empty();
            $('#' + ids[i]).append('<option value="">Select One..</option>');
        }
    } else {
        $('#' + ids).empty();
        $('#' + ids).append('<option value="">Select One..</option>');
    }
}

// creates the selection with provided data
function createSelection(id, data, selValue, selLabel, value) {
    $('#' + id).empty();
    $('#' + id).append('<option value="">Select One..</option>');
    for (var i in data) {
        $('#' + id).append('<option value="' + data[i][selValue] + '">' + data[i][selLabel] + '</option>');
    }
    $('#' + id).val(value || '');
}

// resets the given form 
function resetForm(form) {
    $(form).trigger('reset');
    if($('#id').length){
        $('#id').val('');
    }
}

// provides object for submitting forms with ajax
function submitFormAjax(url, data) {
    var fullUrl = makeUrl(url);
    return $.ajax({
        method: "POST",
        url: fullUrl,
        data: data
    });
}

// ajax gets the object fo ajax get request
function ajaxGetObj(url) {
    var fullUrl = makeUrl(url);
    return $.ajax({
        url: fullUrl
    });
}

function ajaxPostObj(url,data){
    var fullUrl = makeUrl(url);
    return $.ajax({
        method: "POST",
        url: fullUrl,
        data: data
    });
}

function createDataTable(domId,response,fields,pk){
    if($('#'+domId).length){
        var t = document.getElementById(domId);
        var dom = $('#'+domId);
        $(dom).find("tr:gt(0)").remove();
        var rowCount = 1;
        var data = response.data;
        if(data.length){
            for(var i in data){
                
                var row = t.insertRow(rowCount);
                for(var f in fields){
                    row.insertCell(f).innerHTML = data[i][fields[f]];
                }
                row.insertCell(fields.length).innerHTML = "<a href='javascript:void(0)' onclick='edit("+data[i][pk]+")' class='btn btn-xs btn-primary'><i class='glyphicon glyphicon-edit'></i>"+t_label('Edit')+"</a>&nbsp;&nbsp;<a href='javascript:void(0)' onclick='delt("+data[i][pk]+")' class='btn btn-xs btn-danger'><i class='glyphicon glyphicon-trash'></i>"+t_label('Delete')+"</a>";
                rowCount++;
            }
            createPagination(response);
        }else{
            alert('No data provided to create table.');
        }
    }else{
        alert('Dom not found for creating table.');
    }
}

function deleteData(url){
   var fullUrl = makeUrl(url);
   var confr = window.confirm("Are you sure you want to delete?");
   if(confr){
        var data = {_method:'DELETE',_token:$('#_token').val()};
        return submitFormAjax(fullUrl,data);
    }
}

function makeUrl(url){
    if (url.indexOf('http') > -1) {
         return url;
    }else{
        return (baseUrl + '/' + url);
    }
}




