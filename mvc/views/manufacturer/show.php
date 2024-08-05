{{ include('layouts/header.php', {title:'Show Manufacturer'})}}
    <div class="container">
        <h3>Manufacturer</h3>
        <div class="show">
            <p><strong>Name : </strong>{{ manufacturer.name }}</p>
            <p><strong>Address : </strong>{{ manufacturer.address }}</p>
            <p><strong>Phone : </strong>{{ manufacturer.phone }}</p>
            <p><strong>Country of origin : </strong>{{ manufacturer.country_of_origin }}</p>
            <p><strong>Year of creation : </strong>{{ manufacturer.year_of_creation }}</p>
            <p><strong>Ranking : </strong>{{ manufacturer.ranking }}</p>
        </div>
        <div class="buttons">
            <a href="{{base}}/manufacturer" class="btn back">Back</a>
        </div> 
    </div>
{{ include('layouts/footer.php')}}