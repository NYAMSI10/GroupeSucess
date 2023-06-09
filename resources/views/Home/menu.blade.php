<div class="sidebar-collapse">
    <ul class="nav metismenu" id="side-menu">
        <li class="nav-header">
            <div class="dropdown profile-element"> <span>
                    @if(users(auth()->user()->id)->image == null)
                        <img alt="image" class="img-circle" src="{{asset('asset/img/logo.jpg')}}" width="50" height="50"/>

                    @else
                        <img alt="image" class="img-circle" src="{{asset('photo/'.users(auth()->user()->id)->image)}}" width="50" height="50"/>

                    @endif
                             </span>
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{Auth::user()->nom}}</strong>
                             </span> <span class="text-muted text-xs block">Admin <b class="caret"></b></span> </span> </a>
                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                    <li><a href="{{route('profil.index')}}">Profile</a></li>

                    <li class="divider"></li>
                    <li><a href="{{route('user.logout')}}">Logout</a></li>
                </ul>
            </div>
            <div class="logo-element">
                IN+
            </div>
        </li>
        <li class="active">
            <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Tableau de bord</span> <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li ><a href="index.html">Vue global</a></li>

            </ul>
        </li>
        <li>
            <a href="{{route('users.list')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Compte Utilisateur</span></a>
        </li>
        <li>
            <a href="{{route('matiere.index')}}"><i class="fa fa-diamond"></i> <span class="nav-label">Matiéres</span></a>
        </li>
        <li>
            <a href="{{route('classe.index')}}"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Classes</span></a>

        </li>
        <li>
            <a href="#"><i class="fa fa-envelope"></i> <span class="nav-label">Enseignants </span> <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li><a href="{{route('user.index')}}"> Jours</a></li>
                <li><a href="{{route('users.soir')}}">Soirs</a></li>
                <li><a href="{{route('users.vacance')}}">Vacances</a></li>
                <li><a href="{{route('users.concour')}}">Prepa-Concours</a></li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="fa fa-envelope"></i> <span class="nav-label">Elèves </span> <span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li><a href="{{route('student.index')}}"> Jours</a></li>
                <li><a href="{{route('students.soir')}}">Soirs</a></li>
                <li><a href="{{route('students.vacance')}}">Vacances</a></li>
                <li><a href="{{route('students.concour')}}">Prepa-Concours</a></li>
            </ul>
        </li>
        <li>
            <a href="{{route('students.insolvable')}}"><i class="fa fa-flask"></i> <span class="nav-label">Liste des Insolvables</span></a>
        </li>
        <li>
            <a href="{{route('primes.index')}}"><i class="fa fa-edit"></i> <span class="nav-label">Primes</span></a>

        </li>
        <li>
            <a href="{{route('evenements.index')}}"><i class="fa fa-edit"></i> <span class="nav-label">Evénèmentts </span></a>

        </li>
        <li>
            <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Discipline </span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li><a href="{{route('discipline.index')}}"> Faire l'appel</a></li>
                <li><a href="{{route('appel.absent')}}">Liste des Absences</a></li>

            </ul>
        </li>
        <li>
            <a href="{{route('presence.index')}}"><i class="fa fa-edit"></i> <span class="nav-label">Présence </span></a>
        </li>
        <li>
            <a href="{{route('presences.absence') }}"><i class="fa fa-edit"></i> <span class="nav-label">Vos absences </span></a>
        </li>
        <li>
            <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Sujets </span><span class="fa arrow"></span></a>
            <ul class="nav nav-second-level collapse">
                <li><a href="{{route('epreuve.index') }}"> Envoyé sujet</a></li>
                <li><a href="{{route('sujet.allsujet')}}">Tous sujets</a></li>
                <li><a href="{{route('sujet.messujets')}}">Mes sujets</a></li>


            </ul>
        </li>

    </ul>

</div>
