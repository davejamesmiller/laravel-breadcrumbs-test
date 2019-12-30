<a href="/">&laquo; Versions</a>
<br>
<strong>Pages:</strong>
<a href="{{ route('home') }}">Home</a> /
<a href="{{ route('blog') }}">Blog</a> /
<a href="{{ route('category', 1) }}">Category 1</a> /
<a href="{{ route('category', 2) }}">Category 2</a> /
<a href="{{ route('post', 1) }}">Post 1</a> /
<a href="{{ route('post', 2) }}">Post 2</a> /
<a href="{{ url('missing') }}">Error 404</a> /
<a href="{{ url('server-error') }}">Error 500</a> /
<a href="{{ url('unnamed') }}">Unnamed</a> /
<a href="{{ route('section') }}">@@section()</a>
<br>
<strong>Templates:</strong>
<a href="{{ route('bootstrap3') }}">Bootstrap 3</a> /
<a href="{{ route('bootstrap2') }}">Bootstrap 2</a> /
<a href="{{ route('bulma') }}">Bulma</a> /
<a href="{{ route('foundation6') }}">Foundation 6</a> /
<a href="{{ route('materialize') }}">Materialize</a> /
<a href="{{ route('uikit') }}">UIkit</a> /
<a href="{{ route('print_r') }}">print_r</a>
<br>
<strong>Exceptions:</strong>
<a href="{{ url('duplicate-exception') }}">Duplicate</a> /
<a href="{{ url('missing-exception') }}">Missing</a> /
<a href="{{ url('invalid-exception') }}">Invalid</a> /
<a href="{{ url('unnamed-exception-action') }}">Unnamed (Action)</a> /
<a href="{{ url('unnamed-exception-invokable') }}">Unnamed (Invokable)</a> /
<a href="{{ url('unnamed-exception-view') }}">Unnamed (View)</a> /
<a href="{{ url('unnamed-exception-closure') }}">Unnamed (Closure)</a> /
<a href="{{ url('view-exception') }}">View not set</a>
