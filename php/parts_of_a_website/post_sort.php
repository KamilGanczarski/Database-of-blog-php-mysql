
        <nav class='accordion mb-4' id='accordionExample'>
          <div class='card bg-transparent border rounded-top border-dark'>
            <div class='card-header' id='headingOne'>
              <a data-toggle='collapse' data-target='#collapseOne' aria-expanded='true' aria-controls='collapseOne' class='btn btn-sm px-0 text-light collapsed'>
                Upload date
              </a>
            </div>

            <div aria-labelledby='headingOne' data-parent='#accordionExample' class='collapse' id='collapseOne'>
              <a onclick='query_to_PHP("All", "all")' class='px-4 py-3 btn btn-sm text-info'>All</a><br>
            </div>
          </div>
          <div class='card bg-transparent border border-dark'>
            <div class='card-header' id='headingTwo'>
              <a data-toggle='collapse' data-target='#collapseTwo' aria-expanded='false' aria-controls='collapseTwo' class='btn btn-sm px-0 text-light'>
                Type
              </a>
            </div>

            <div aria-labelledby='headingTwo' data-parent='#accordionExample' class='collapse show' id='collapseTwo'>
              <a onclick='query_to_PHP("JavaScript", "filter")' class='px-4 pt-3 btn btn-sm text-info'>JavaScript</a><br>
              <a onclick='query_to_PHP("Java", "filter")' class='px-4 btn btn-sm text-info'>Java</a><br>
              <a onclick='query_to_PHP("PHP", "filter")' class='px-4 btn btn-sm text-info'>PHP</a><br>
              <a onclick='query_to_PHP("Python", "filter")' class='px-4 btn btn-sm text-info'>Python</a><br>
              <a onclick='query_to_PHP("C Language", "filter")' class='px-4 btn btn-sm text-info'>C Language</a><br>
              <a onclick='query_to_PHP("Ruby", "filter")' class='px-4 btn btn-sm text-info'>Ruby</a><br>
              <a onclick='query_to_PHP("Swift", "filter")' class='px-4 pb-3 btn btn-sm text-info'>Swift</a><br>
            </div>
          </div>
          <div class='card bg-transparent border rounded-bottom border-dark'>
            <div class='card-header' id='headingThree'>
              <a data-toggle='collapse' data-target='#collapseThree' aria-expanded='false' aria-controls='collapseThree' class='btn btn-sm px-0 text-light'>
                Sort by
              </a>
            </div>

            <div aria-labelledby='headingThree' data-parent='#accordionExample' class='collapse' id='collapseThree'>
              <a onclick='query_to_PHP("type", "sort")' class='px-4 btn pt-3 btn-sm text-info'>Type</a><br>
              <a onclick='query_to_PHP("title", "sort")' class='px-4 btn btn-sm text-info'>Title</a><br>
              <a onclick='query_to_PHP("create_date", "sort")' class='px-4 btn btn-sm text-info'>Upload date</a><br>
              <a onclick='query_to_PHP("username", "sort")' class='px-4 pb-3 btn btn-sm text-info'>Author</a><br>
            </div>
          </div>
        </nav>
