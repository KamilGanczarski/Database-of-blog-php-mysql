function remove_post(id) {
  let url = 'php/blog configuration/remove_post.php?';
  let query = 'id=' + id;
  window.location.href = url + query;
}
