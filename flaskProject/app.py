from flask import Flask, render_template, request

app = Flask(__name__)

@app.route("/")
def index():
    return render_template("index.html")

@app.route("/about")
def about():
    return render_template("about.html")

@app.route("/admin_page")
def admin_page():
    return render_template("admin_page.html")

@app.route("/admin_page/add-user")
def add_user():
    return render_template("add-user.html")


@app.route("/admin")
def admin():
    if request.method == "POST":
        username = request.form.get("username")
        password = request.form.get("password")

        if username == "admin" and password == "secret":
            return render_template("admin_page.html")
        else:
            return "Неправильный логин или пароль"
    else:
        return render_template("admin_login.html")


if __name__ == "__main__":
    app.run(debug=True)