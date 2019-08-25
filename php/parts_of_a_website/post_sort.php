
        <nav class="accordion mb-4" id="accordionExample">
          <div class="card bg-transparent border rounded-top border-dark">
            <div class="card-header" id="headingOne">
              <a class="btn btn-sm px-0 text-light collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Upload date
              </a>
            </div>

            <div class="collapse" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample">
              <a onclick='queryToPHP("All", "all")' class='px-4 py-3 btn btn-sm text-info'>All</a><br>
            </div>
          </div>
          <div class="card bg-transparent border border-dark">
            <div class="card-header" id="headingTwo">
              <a class="btn btn-sm px-0 text-light" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Type
              </a>
            </div>

            <div class="collapse show" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <a onclick='queryToPHP("JavaScript", "filter")' class='px-4 pt-3 btn btn-sm text-info'>JavaScript</a><br>
              <a onclick='queryToPHP("Java", "filter")' class='px-4 btn btn-sm text-info'>Java</a><br>
              <a onclick='queryToPHP("PHP", "filter")' class='px-4 btn btn-sm text-info'>PHP</a><br>
              <a onclick='queryToPHP("Python", "filter")' class='px-4 btn btn-sm text-info'>Python</a><br>
              <a onclick='queryToPHP("C Language", "filter")' class='px-4 btn btn-sm text-info'>C Language</a><br>
              <a onclick='queryToPHP("Ruby", "filter")' class='px-4 btn btn-sm text-info'>Ruby</a><br>
              <a onclick='queryToPHP("Swift", "filter")' class='px-4 pb-3 btn btn-sm text-info'>Swift</a><br>
            </div>
          </div>
          <div class="card bg-transparent border rounded-bottom border-dark">
            <div class="card-header" id="headingThree">
              <a class="btn btn-sm px-0 text-light" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Sort by
              </a>
            </div>

            <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionExample">
              <a onclick='queryToPHP("type", "sort")' class='px-4 btn pt-3 btn-sm text-info'>Type</a><br>
              <a onclick='queryToPHP("title", "sort")' class='px-4 btn btn-sm text-info'>Title</a><br>
              <a onclick='queryToPHP("create_date", "sort")' class='px-4 btn btn-sm text-info'>Upload date</a><br>
              <a onclick='queryToPHP("username", "sort")' class='px-4 pb-3 btn btn-sm text-info'>Author</a><br>
            </div>
          </div>
        </nav>
