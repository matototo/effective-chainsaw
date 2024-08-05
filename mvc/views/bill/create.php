{{ include('layouts/header.php', {title:'Create Bill'})}}
    <div class="container">
        <form  method="post">
            <h3>New Bill</h3>
            <label>
                <p class="carselect">Please choose a car : </p>
                <select name="serial_number">
                {% for name in cars %}
                    <option value="{{ name.serial_number }}">{{ name.name }}</option>
                {% endfor %}
                </select>
            </label>
            {% if errors.name is defined %}
                <span class="error">{{ errors.name }}</span>
            {% endif %}
            <label>Quantity
                <input type="text" name="qt" value="{{ automobile_bill.qt}}">
            </label>
            {% if errors.qt is defined %}
                <span class="error">{{ errors.qt }}</span>
            {% endif %}
            <label>
            <p class="carselect">Please choose a client : </p>
                <select name="client_id">
                {% for name in clients %}
                    <option value=" {{ name.id }} ">{{ name.name }}</option>
                {% endfor %}
                </select>
            </label>
            <div class="buttons">
                <div>
                    <a href="{{base}}/client" class="btn back">Back</a>
                </div>
                <div>
                    <input type="submit" class="btn" value="Save">
                </div>
            </div>
        </form>
    </div>
{{ include('layouts/footer.php')}}