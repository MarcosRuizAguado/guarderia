<div id="login">
    <h1>Guarderia Infantil</h1>
    <?php echo $this->tag->stylesheetLink("css/style_login.css"); ?>
    <form action="{{ url('index/submitLogin') }}" method="POST">

        <label>E-mail</label><br>
        <input type="email" id="email" name="email" placeholder="Email"><br>

        <label>Contraseña</label><br>
        <input type="password" id="contra" name="contra" placeholder="Contraseña">

        <div id="error">
            {% if error is defined %}
                {{error}}
            {% endif %}
        </div>

        <button type="submit">Entrar</button>

    </form>
</div>

