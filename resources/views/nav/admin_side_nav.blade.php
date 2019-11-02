<nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" id="accordionSidebar">
    <div class="container-fluid d-flex flex-column p-0">
        <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
            <div class="sidebar-brand-icon"><img class="img-fluid" src="{{asset('assets/img/logo.png')}}"></div>
            <div class="sidebar-brand-text mx-4"><span>Rally NPLC</span></div>
        </a>
        <hr class="sidebar-divider my-0">
        <ul class="nav navbar-nav text-light">
            <li class="nav-item" role="presentation"><a class="nav-link {{$pages == 'dash' ? 'active' : ''}}" href="{{ route('admin') }}"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <li class="nav-item" role="presentation">
                <a class="btn btn-link nav-link @if($pages=='uadm' || $pages=='ulo' || $pages=='upar' || $pages=='uadd') active @endif" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#user" role="button">
                    <i class="fas fa-user-cog"></i><span>Users Management</span>
                </a>
                <div class="collapse @if($pages=='uadm' || $pages=='ulo' || $pages=='upar' || $pages=='uadd') show @endif" id="user">
                    <div class="bg-white border rounded py-2 collapse-inner">
                        <a class="collapse-item @if($pages=='uadm') active @endif" href="{{ route('user.admin') }}">Administrator</a>
                        <a class="collapse-item @if($pages=='ulo') active @endif" href="{{ route('user.liaison') }}">Liaison Officers</a>
                        <a class="collapse-item @if($pages=='upar') active @endif" href="{{ route('user.participant') }}">Participants</a>
                        <a class="collapse-item @if($pages=='uadd') active @endif" href="{{ route('users.create') }}">Add New User / Team</a>
                    </div>
                </div>
            </li>
            <li class="nav-item" role="presentation">
                <a class="btn btn-link nav-link @if($pages=='glist' || $pages=='ghis') active @endif" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#game" role="button">
                    <i class="fas fa-gamepad"></i><span>Games Management</span>
                </a>
                <div class="collapse @if($pages=='glist' || $pages=='ghis') show @endif" id="game">
                    <div class="bg-white border rounded py-2 collapse-inner">
                        <a class="collapse-item @if($pages=='glist') active @endif" href="{{ route('games.index') }}">Games List</a>
                        <a class="collapse-item @if($pages=='ghis') active @endif" href="{{ route('history.index') }}">History Play of Games</a>
                    </div>
                </div>
            </li>
            <li class="nav-item" role="presentation">
                <a class="btn btn-link nav-link @if($pages=='qlist' || $pages=='qhis') active @endif" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#quiz" role="button">
                    <i class="fas fa-question-circle"></i><span>Quiz Management</span>
                </a>
                <div class="collapse @if($pages=='qlist' || $pages=='qhis') show @endif" id="quiz">
                    <div class="bg-white border rounded py-2 collapse-inner">
                        <a class="collapse-item @if($pages=='qlist') active @endif" href="{{ route('quiz.index') }}">Quiz List</a>
                        <a class="collapse-item @if($pages=='qhis') active @endif" href="{{ route('historyQuiz.index') }}">History Play of Quiz</a>
                    </div>
                </div>
            </li>
            <li class="nav-item" role="presentation">
                <a class="btn btn-link nav-link @if($pages=='plist' || $pages=='phis') active @endif" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#photo" role="button">
                    <i class="fas fa-images"></i><span>Photo Management</span>
                </a>
                <div class="collapse @if($pages=='plist' || $pages=='phis') show @endif" id="photo">
                    <div class="bg-white border rounded py-2 collapse-inner">
                        <a class="collapse-item @if($pages=='plist') active @endif" href="{{ route('photo.index') }}">Photo List</a>
                        <a class="collapse-item @if($pages=='phis') active @endif" href="{{ route('historyPhoto.index') }}">History Play of Photo</a>
                    </div>
                </div>
            </li>
            <li class="nav-item" role="presentation">
                <a class="btn btn-link nav-link @if($pages=='mail' || $pages=='send') active @endif" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#mail" role="button">
                    <i class="fas fa-mail-bulk"></i><span>Blast Email</span>
                </a>
                <div class="collapse @if($pages=='mail' || $pages=='send') show @endif" id="mail">
                    <div class="bg-white border rounded py-2 collapse-inner">
                        <a class="collapse-item @if($pages=='mail') active @endif" href="{{ route('mailing.index') }}">Recipient List</a>
                        <a class="collapse-item @if($pages=='send') active @endif" href="{{ route('mailing.create') }}">Send Email</a>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>