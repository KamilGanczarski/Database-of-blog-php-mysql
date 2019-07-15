function queryToPHP(item, behaviour) {
  let url = '';
  let query = '';

  if(behaviour === 'remove') {
    // Remove post
    url = 'php/blog_configuration/remove_post.php?';
    query = 'id=' + item;
    window.location.href = url + query;
  } else if (behaviour === 'filter') {
    // Filter posts
    url = 'php/blog_configuration/sort_posts.php?';
    query = 'postFilter=' + 'SELECT * FROM Blog_content WHERE title = \'' + item + '\'';
    window.location.href = url + query;
  } else if(behaviour === 'sort') {
    // Sort posts
    url = 'php/blog_configuration/sort_posts.php?';
    query = 'postFilter=' + 'SELECT * FROM Blog_content ORDER BY ' + item + ' ASC';
    window.location.href = url + query;
  }
}
