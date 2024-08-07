{{ include('layouts/header.php', {title:'Show Manufacturer'})}}
    <div class="container">
        <h3>{{ manufacturer.name }}</h3>
        <div class="show">
            <p><strong>Address : </strong>{{ manufacturer.address }}</p>
            <p><strong>Phone : </strong>{{ manufacturer.phone }}</p>
            <p><strong>Country of origin : </strong>{{ manufacturer.country_of_origin }}</p>
            <p><strong>Year of creation : </strong>{{ manufacturer.year_of_creation }}</p>
            <p><strong>Ranking : </strong>{{ manufacturer.ranking }}</p>
        </div>
    </div>
{{ include('layouts/footer.php')}}