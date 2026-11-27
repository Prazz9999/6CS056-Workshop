<nav>
    @guest
        <a href="/register">Register</a>
        <a href="/login">Login</a>
    @endguest

    @auth
        <a href="/courses">Courses</a>
        <a href="/students">Students</a>

        <form action="/logout" method="POST" style="display: inline;">
            @csrf
            <button type="submit">Log Out</button>
        </form>
    @endauth
</nav>
