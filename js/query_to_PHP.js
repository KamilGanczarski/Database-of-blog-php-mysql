function query_to_PHP(item, behaviour) {
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
    query = 'search_filter=' + 'WHERE Type_of_blog.name = \"' + item + '\"&';
    query += 'search_filter_msg=Filter: ' + item;
    window.location.href = url + query;
  } else if (behaviour === 'id') {
    // Filter posts
    url = 'php/blog_configuration/sort_posts.php?';
    query = 'search_filter=' + 'WHERE Post.id = \'' + item + '\'&';
    query += 'search_filter_msg=Return to all';
    window.location.href = url + query;
  } else if(behaviour === 'sort') {
    // Sort posts
    url = 'php/blog_configuration/sort_posts.php?';
    query = 'search_filter=' + 'ORDER BY ' + item + ' ASC&';

    switch(item) {
      case 'type':
        item = 'type';
        break;
      case 'title':
        item = 'title';
        break;
      case 'create_date':
        item = 'upload date';
        break;
      case 'username':
        item = 'author';
        break;
    }

    query += 'search_filter_msg=Sort by: ' + item;
    window.location.href = url + query;
  } else {
    // Show all
    url = 'php/blog_configuration/sort_posts.php?';
    query = 'search_filter=' + '';
    window.location.href = url + query;
  }
}

function are_you_sure(item, behaviour) {
  $('.sure_button')[0].addEventListener('click', () => {
    query_to_PHP(item, behaviour);
  });
}
