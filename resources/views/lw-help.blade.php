<div class="p-6 border my-4">
    <h1 class="text-xl font-bold">Help with LW Crud</h1>
    <p>To remove this section - switch $showHelp to false in setup()</p>

    <ul class="mt-3">
        <li>indexField = "id"; Private Var use setter/getter setIndexField()</li>
        <li>$this->itemType = "Genre";</li>
        <li>$this->classPathBase .= "App\Models\Genre";</li>
        <li>$this->createView = "livewire.create-genre";</li>
        <li>$this->listView = "livewire.list-genres";</li>
        <li>$this->listNames = array(
            "gen_name" => "Name",
            "gencat_name" => "Parent"
            );</li>
        <li>$this->sortField = "gen_name";</li>
        <li>$this->editSettings = [ "gen_name" => ['type' => 'text','label' => 'Name'] ]</li>
        <li>$this->showHelp = true;></li>
    </ul>

    <h2 class="text-l font-bold mt-6">Useful Method Names</h2>
    <p>setup() : place all your setup variables in here - as above</p>
    <p>filterData($data) : use to filter the data after it has been retrieved from the database - MUST return a collection</p>
    <p>(pre/after)storeActions($data) before and after save, pre returns post does not</p>

    <h2 class="text-l font-bold mt-6">Hints</h2>
    <p><strong>If you need a join:</strong> ->join('genre_parents','genres.gen_parent','=','genre_parents.id')->select('genre_parents.*','genres.*');</p>
    <p>Place this in the model after the search, to have it work in the lists without any more fiddling.</p>
    <p><strong>Button Classes</strong> text-white uppercase bg-green-500 hover:bg-red-500</p>
</div>

