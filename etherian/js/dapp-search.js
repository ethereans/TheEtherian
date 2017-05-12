jQuery(document).ready(function($) {
  $.get('http://jquintal.webfactional.com/wp-json/wp/v2/dapps/?per_page=100', function(data){
    var dappNames = [];
    var dappLinks = [];

    for (i = 0; i < data.length; i++)
    {
      var title = data[i]['title']['rendered'];
      var slug = data[i]['slug'];

      dappNames.push(title);
      dappLinks[title] = data[i]['link'];
    }

    $('input[name="s"]').typeahead({
      source: dappNames,
      fitToElement: true,
      updater: function(item) {
        navigateToDapp(item);
      }
    });

    function navigateToDapp(item, links = dappLinks) {
      window.location.href = links[item];
    }
  },'json');
});
