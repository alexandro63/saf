<?php
return [

    // Menú principal
    'items' => [
        [
            'type'     => 'menu',
            'route'    => 'home',
            'title'    => 'Tablero',
            'icon'     => 'fas fa-home',
            'activeOn' => 'home.*',
        ],

        [
            'type'  => 'header',
            'title' => 'MÓDULOS',
            'icon'  => 'fa fa-ellipsis-h',
        ],

        [
            'type'     => 'submenu',
            'title'    => 'Administración',
            'icon'     => 'fas fa-user-shield',
            'children' => 'administration',
            'isActive' => 'administration.*'
        ],

        [
            'type'     => 'submenu',
            'title'    => 'Registro',
            'icon'     => 'fas fa-user-shield',
            'children' => 'registration',
            'isActive' => 'registration.*'
        ],

    ],

    // Definición de los children
    'children' => [

        'administration' => [
            [
                'route' => 'roles.index',
                'title' => 'Roles',
            ],
            [
                'route' => 'users.index',
                'title' => 'Usuarios',
            ],
            [
                'route' => 'group_users.index',
                'title' => 'Grupo de usuarios',
            ],
            [
                'route' => 'people.index',
                'title' => 'Personas',
            ],
            [
                'route' => 'group_assign.index',
                'title' => 'Asignaciones de grupos',
            ],

        ],

        'registration' => [
            [
                'route' => 'teachers.index',
                'title' => 'Docentes',
            ],
            [
                'route' => 'subjects.index',
                'title' => 'Materias',
            ],
            [
                'route' => 'degrees.index',
                'title' => 'Carreras',
            ],
            [
                'route' => 'teacher_settings.index',
                'title' => 'Ajustes docentes',
            ],
            [
                'route' => 'academic_planning.index',
                'title' => 'Planificación acádemica',
            ],
            [
                'route' => 'student_enrollments.index',
                'title' => 'Inscripción alumnos',
            ],
            [
                'route' => 'other_income.index',
                'title' => 'Otros ingresos',
            ],
            [
                'route' => 'administrative.index',
                'title' => 'Administrativo',
            ],
            [
                'route' => 'enrolled_students.index',
                'title' => 'Alumnos inscritos',
            ],

        ],

    ],

];
