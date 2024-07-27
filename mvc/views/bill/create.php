{{ include('layouts/header.php', {title:'Create Bill'})}}
    <div class="container">
        <form  method="post">
            <h2>New Bill</h2>
            <label>Serial number
                <select name="serial_number">
                    <option value="null">Veuillez choisir une option :</option>
                {% for serial_number in serials %}
                    <option value=" {{ serial_number.serial_number }} ">{{ serial_number.serial_number }}</option>
                {% endfor %}
                </select>
            </label>
            {% if errors.serial_number is defined %}
                <span class="error">{{ errors.serial_number }}</span>
            {% endif %}
            <label>Quantity
                <input type="text" name="qt" value="{{ automobile_bill.qt}}">
            </label>
            {% if errors.qt is defined %}
                <span class="error">{{ errors.qt }}</span>
            {% endif %}
            <label>Client
                <select name="name">
                    <option value="null">Veuillez choisir une option :</option>
                {% for name in clients %}
                    <option value=" {{ name.name }} ">{{ name.name }}</option>
                {% endfor %}
                </select>
            </label>
            <input type="submit" class="btn" value="Save">
        </form>
    </div>
{{ include('layouts/footer.php')}}