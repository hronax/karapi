<?php

return [

    'main_menu' => [
        'panel' => 'Админ панель',
        'categories' => 'Категории новостей',
        'home' => 'Главная',
        'auditories' => 'Аудитории',
        'buildings' => 'Корпуса',
        'subjects' => 'Предметы',
        'groups' => 'Группы',
        'departments' => 'Факультеты',
        'teachers' => 'Преподаватели',
        'pairs' => 'Пары (временные рамки)',
        'specializations' => 'Специальности',
        'list' => 'Списки',
        'content' => 'Контент',
        'schedule' => 'Расписание',
        'news' => 'Новости / Анонсы',
        'gifts' => 'Магазин сувениров',
        'courses' => 'Дополнительные курсы',
        'exams' => 'Экзамены / Зачеты',
        'changes' => 'Замены',
    ],
    'actions' => [
        'new' => 'Добавить',
        'th' => 'Действия',
        'view' => 'Просмотреть',
        'edit' => 'Редактировать',
        'delete' => 'Удалить',
        'back' => 'Назад',
        'confirm_delete' => 'Подтвердить удаление?',
        'search' => 'Поиск...',
        'create' => 'Создать',
        'update' => 'Обновить'
    ],
    'auditories' => [
        'single' => 'Аудитория',
        'single_r' => 'информацию об Аудитории',
        'columns' => [
            'code' => 'Номер',
            'building' => 'Корпус'
        ]
    ],
    'categories' => [
        'single' => 'Кaтегория',
        'single_r' => 'информацию о Категории',
        'columns' => [
            'name' => 'Название',
            'news_count' => 'Количество новостей'
        ]
    ],
    'buildings' => [
        'single' => 'Корпус',
        'single_r' => 'информацию о Корпусе',
        'columns' => [
            'name' => 'Название'
        ]
    ],
    'subjects' => [
        'single' => 'Предмет',
        'single_r' => 'информацию о Предмете',
        'columns' => [
            'name' => 'Название'
        ]
    ],
    'groups' => [
        'single' => 'Группа',
        'single_r' => 'информацию о Группе',
        'columns' => [
            'code' => 'Название',
            'specialization' => 'Специальность',
            'course_number' => 'Курс',
            'department' => 'Факультет'
        ]
    ],
    'departments' => [
        'single' => 'Факультет',
        'single_r' => 'информацию о Факультете',
        'columns' => [
            'name' => 'Название'
        ]
    ],
    'specializations' => [
        'single' => 'Специальность',
        'single_r' => 'информацию о Специальности',
        'columns' => [
            'name' => 'Название',
            'code' => 'Код специальности',
            'department' => 'Факультет'
        ]
    ],
    'teachers' => [
        'single' => 'Преподаватель',
        'single_r' => 'информацию о Преподавателе',
        'columns' => [
            'fio' => 'Ф.И.О.'
        ]
    ],
    'pairs' => [
        'single' => 'Пара',
        'single_r' => 'информацию о Паре',
        'columns' => [
            'building' => 'Корпус',
            'pair_number' => 'Номер пары',
            'time_start' => 'Время начала',
            'time_end' => 'Время окончания',
        ]
    ],
    'news' => [
        'single' => 'Новость',
        'single_r' => 'Новость',
        'types' => [
            'news' => 'Новость',
            'announce' => 'Анонс',
            'regular' => 'Обычная новость',
            'top' => 'Важная новость',
        ],
        'columns' => [
            'title' => 'Заголовок',
            'text' =>  'Текст',
            'period' => 'Период времени',
            'type' => 'Тип',
            'image' => 'Изображение',
            'category' => 'Категория',
            'department' => 'Факультет',
            'is_top' => 'Важность'
        ]
    ],
    'gifts' => [
        'single' => 'Сувенир',
        'single_r' => 'информацию о Сувенире',
        'columns' => [
            'name' => 'Название',
            'price' => 'Цена',
            'description' => 'Описание',
            'image' => 'Фото',
        ]
    ],
    'courses' => [
        'single' => 'Курс',
        'single_r' => 'информацию о Курсе',
        'columns' => [
            'name' => 'Название',
            'description' => 'Описание',
            'start_date' => 'Дата начала',
            'image' => 'Изображение'
        ]
    ],
    'exams' => [
        'single' => 'Экзамен/Зачет',
        'single_r' => 'информацию об Экзамене/Зачете',
        'columns' => [
            'group' => 'Группа',
            'subject' => 'Предмет',
            'type' => 'Тип',
            'auditory' => 'Аудитория',
            'teacher' => 'Преподаватель',
            'pass_date' => 'Дата и время сдачи'
        ],
        'types' => [
            'exam' => 'Экзамен',
            'zalik' => 'Зачет'
        ]
    ],
    'changes' => [
        'single' => 'Замена',
        'single_r' => 'Замену',
        'columns' => [
            'group' => 'Группа',
            'subject' => 'Предмет',
            'pair_number' => 'Номер пары',
            'auditory' => 'Аудитория',
            'teacher' => 'Преподаватель',
            'date' => 'Дата'
        ]
    ],
    'schedule' => [
        'single' => 'Пара',
        'single_r' => 'Пару',
        'columns' => [
            'group' => 'Группа',
            'subject' => 'Предмет',
            'week_day' => 'День недели',
            'auditory' => 'Аудитория',
            'teacher' => 'Преподаватель',
            'pair_number' => 'Номер пары',
            'position' => 'Верхняя/нижняя неделя'
        ],
        'positions' => [
            'pos0' => 'Каждую неделю',
            'pos1' => 'Верхняя неделя',
            'pos2' => 'Нижняя неделя',
        ]
    ]
];
