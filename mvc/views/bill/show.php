{{ include('layouts/header.php', {title:'Show Bill'})}}
    <div class="container">
        <h3>Bill number {{ bill.bill_number }}</h3>
        <div class="show">
        <p><strong>Client : </strong>
        {% if bill.client_id == 1 %}
            <a href="{{base}}/client/show?id=1">John Doe</a></p>
        {% elseif bill.client_id == 2 %}
            <a href="{{base}}/client/show?id=2">Jane Smith</a></p>
        {% elseif bill.client_id == 3 %}
            <a href="{{base}}/client/show?id=3">Carlos Garcia</a></p>
        {% elseif bill.client_id == 4 %}
            <a href="{{base}}/client/show?id=4">Maria Lopez</a></p>
        {% elseif bill.client_id == 5 %}
            <a href="{{base}}/client/show?id=5">Alice Johnson</a></p>
        {% else %}
            <p>woy</p>
        {% endif%}
        <p><strong>Date : </strong>{{ bill.bill_date}}</p>
        </div>
        <div class="buttons">
            <a href="{{base}}/bill" class="btn back">Back</a>
        </div>
    </div>
{{ include('layouts/footer.php')}}

