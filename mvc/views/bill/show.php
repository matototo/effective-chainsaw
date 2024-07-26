{{ include('layouts/header.php', {title:'Show Bill'})}}
    <div class="container">
        <h1>Client</h1>
        <p><strong>Name : </strong>{{ automobile_bill.serial_number}}</p>
        <p><strong>Address : </strong>{{ automobile_bill.qt}}</p>
        <p><strong>Phone : </strong>{{ automobile_bill.total}}</p>
        <p><strong>Zip Code : </strong>{{ automobile_bill.bill_number}}</p>
    </div>
{{ include('layouts/footer.php')}}

<label>Serial number
                <input type="text" name="serial_number" value="{{ automobile_bill.serial_number}}">
            </label>
            {% if errors.address is defined %}
                <span class="error">{{ errors.serial_number }}</span>
            {% endif %}
            <label>Quantity
                <input type="text" name="qt" value="{{ automobile_bill.qt}}">
            </label>
            {% if errors.qt is defined %}
                <span class="error">{{ errors.qt }}</span>
            {% endif %}