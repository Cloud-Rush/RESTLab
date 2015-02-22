$_SERVER['REQUEST_METHOD']

$_SERVER['REQUEST_URI']

$resource = array_shift($paths);
 
if ($resource == 'corals') {
    $name = array_shift($paths);
 
    if (empty($name)) {
        $this->handle_base($method);
    } else {
        $this->handle_name($method, $name);
    }
 
} else {
    // We only handle resources under 'corals'
    header('HTTP/1.1 404 Not Found');
}

switch($method) {
  case 'PUT':
      $this->create_coral($name);
      break;
 
  case 'DELETE':
      $this->delete_coral($name);
      break;
 
  case 'GET':
      $this->display_coral($name);
      break;
 
  default:
      header('HTTP/1.1 405 Method Not Allowed');
      header('Allow: GET, PUT, DELETE');
      break;
  }
