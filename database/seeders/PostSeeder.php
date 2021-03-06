<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::updateOrCreate([
            'title' => 'Петраков став головним тренером збірної України',
        ], [
            'text' => 'Українська асоціація футболу призначила Олександра Петракова повноправним головним тренером збірної України. Наставник позбавився приставки в.о. (виконуючий обов\'язки головного тренера).
                    Про це повідомляє офіційний сайт УАФ.
                    Виконком УАФ, засідання якого пройшло сьогодні в столичному Будинку футболу, затвердив Петракова головним тренером національної збірної України. Контракт підписаний до грудня 2022 року.
                    "Я абсолютно переконаний, що Олександр Васильович Петраков своєю роботою та результатами повністю заслужив зміну формального статусу на чолі збірної. У зв’язку із цим, враховуючи рішення Комітету національних збірних команд УАФ, я вношу пропозицію щодо призначення Петракова Олександра Васильовича головним тренером національної збірної команди України з футболу на строк до 30 грудня 2022 року (тобто до завершення чемпіонату світу в Катарі) з можливістю пролонгації за згодою сторін до 30 липня 2024 року", - зазначив президент УАФ Андрій Павелко на засіданні.',
        ]);
        Post::updateOrCreate([
            'title' => 'Україна готова зменшити вартість транзиту газу своєю територією - Зеленський',
        ], [
            'text' => 'Президент України Володимир Зеленський провів телефонну розмову з Президентом Європейської комісії Урсулою фон дер Ляєн. Президент України Володимир Зеленський обговорив із президентом Європейської комісії Урсулою фон дер Ляєн ідею створення регіональної платформи зі зміцнення енергетичної безпеки.

Як повідомляється на сайті глави держави, під час телефонної розмови Зеленський поінформував співрозмовницю про безпекову ситуацію на Донбасі у зв’язку з напругою навколо українських кордонів, а також про зусилля України, спрямовані на мирне врегулювання.

Вони обговорили загострення ситуації на європейсько-білоруському та українсько-білоруському кордонах і дійшли висновку, що ця ситуація є гібридною атакою, яка вимагає спільних зусиль та взаємодії.

Зеленський розповів президента Єврокомісії про кроки, які здійснює Україна для посилення безпеки на українсько-білоруському кордоні.

У цьому контексті вони обговорили шляхи розширення співпраці між Україною та Євросоюзом у міграційній сфері та можливості залучення допомоги ЄС для облаштування українсько-білоруського кордону.

Крім того, Зеленський та фон дер Ляєн також детально обговорили питання енергетичної безпеки Європи.

"У цьому зв’язку президент України вкотре наголосив, що проект "Північний потік-2" є насамперед безпековою загрозою для всієї Європи. Глава держави представив низку пропозицій, спрямованих на запобігання енергетичній кризі у Європі. Зокрема, співрозмовники обговорили ідею щодо створення регіональної платформи зі зміцнення енергетичної безпеки", - йдеться у повідомленні.

Президент наголосив, що Україна готова зменшити вартість транзиту газу своєю територією та надати власні підземні сховища для зберігання стратегічного резерву палива.',
        ]);
        Post::updateOrCreate([
            'title' => 'Запорізький Мотор в гандбольній Лізі чемпіонів здобув третю перемогу',
        ], [
            'text' => 'Найкращий клуб України обіграв угорський "Веспрем".
            Запорізький "Мотор" зіграв поєдинок 7-го туру гандбольної Ліги чемпіонів. Український клуб вдома приймав угорський "Веспрем".

Матч завершився перемогою "Мотора" з рахунком 29:27.

"Мотор" (Україна) - "Веспрем" (Угорщина) - 29:27

"Мотор": Комок, В\'юнник, Кубатко, Малашинскас, Пуховський, Денисов, Турченко, Моліна, Козакевич, Горига, Себетич, Донцов, Касай, Васильєв, Бохан, Тютюнник

Після цієї звитяги "Мотор" піднявся у своїй групі на 4-е місце. У запорожців три перемоги в семи іграх. 25 листопада "Мотор" зіграє в гостях проти "Веспрему".',
        ]);
        Post::updateOrCreate([
            'title' => 'Катар-2022: букмекери оцінили шанси збірної України потрапити на чемпіонат світу',
        ], [
            'text' => 'Аналітики не дуже вірять в команду Олександра Петракова.
            Збірна України обіграла Боснію і Герцеговину та забезпечила собі місце у стикових матчах відбору до ЧС-2022. "Ми не боїмося нікого. Хто б нам не дістався, думаю, ми його обіграємо та поїдемо на чемпіонат світу до Катару", - сказав наставник збірної України Олександр Петраков. ',
        ]);
        Post::updateOrCreate([
            'title' => 'Збірна України встановила унікальний рекорд у відборі на чемпіонат світу',
        ], [
            'text' => 'Україна, завдяки перемогам над боснійцями і фінами, зіграє в плей-офф відбору на мундіаль.
            У вівторок, 16 листопада, національна збірна України в непростому матчі заключного туру кваліфікації на чемпіонат світу-2022 обіграла в гостях Боснію і Герцеговину (2:0).

Даний тріумф став всього лише другим у відборі для української команди, ще 6 ігор завершилися нічийним результатом.

Збірній України для виходу в плей-офф європейського відбору знадобилося найменше перемог з 1998 року, коли в кваліфікації на мундіаль почали брати участь 32 команди, повідомляє Tribuna.com. ',
        ]);
        Post::updateOrCreate([
            'title' => 'Довгоочікуваний дебют: Анчелотті планує надати шанс Луніну в найближчому матчі Ла Ліги',
        ], [
            'text' => 'Лунін вперше в нинішньому сезоні може зіграти за "Реал". Талановитий український голкіпер Андрій Лунін може вперше в нинішньому сезоні зіграти за мадридський "Реал".

За інформацією видання DefensaCentral, головний тренер "вершкових" Карло Анчелотті попередив українця, щоб той був готовий вийти в стартовому складі в найближчій грі чемпіонату Іспанії проти "Гранади".

Італійський фахівець побоюється, що основний голкіпер "галактікос" Тібо Куртуа не зможе взяти участі в блискучому поєдинку через травму, отриману в розташуванні збірної Бельгії. ',
        ]);
        Post::updateOrCreate([
            'title' => 'Лідер збірної Боснії і Герцеговини висловився про поразку від України',
        ], [
            'text' => 'Анель Ахмедходжич вважає, що його команда показала гідну гру і заслуговувала більшого. Збірна України в заключному турі кваліфікації на чемпіонат світу в Катарі обіграла в гостях збірну Боснії і Герцеговини (2:0).

Після матчу лідер оборони боснійської збірної Анель Ахмедходжич прокоментував результат поєдинку.

"Ми намагалися боротися по ходу всього поєдинку. Вважаю, що ми показали, що вміємо битися до останнього, і цей матч мав суттєву відмінність, порівняно з грою проти Фінляндії. Наша команда зіграла добре, але нам не пощастило з реалізацією своїх моментів.',
        ]);
        Post::updateOrCreate([
            'title' => 'Петраков - про шанси України пройти плей-офф, гру Довбика і плани на найближче майбутнє',
        ], [
            'text' => 'В. о. головного тренера впевнений, що збірній України під силу пройти будь-якого суперника. У вівторок, 16 листопада, національна збірна України обіграла в гостях Боснію і Герцеговину і завоювала путівку в плей-офф відбору на чемпіонат світу-2022 в Катарі.

В. о. головного тренера збірної України Олександр Петраков провів прес-конференцію після матчу, передає офіційний сайт УАФ.

- Ми дуже задоволені. Але ми виконали всього 50 відсотків завдання. Попереду - жеребкування, плей-офф.

- Чи здатна збірна України побороти плей-офф?

- Ми не боїмося нікого, це однозначно. Будемо грати, хочемо пробитися на чемпіонат світу. Хто б нам не дістався, думаю, ми його обіграємо і поїдемо в Катар.

- Склалося враження, що в товариському матчі з Болгарією збірна України залишила багато сил. Може, тому в першому таймі команда виглядала трохи академічно?

- Такого не було. Була нервова гра, я знав, що вона буде такою. Надзусиль з Болгарією ми не доклали. Команда виглядала добре, ми трохи нервували, щось не виходило. Але я задоволений грою хлопців, характером, який вони показали. Такі матчі дуже важко грають. Це була гра на результат, і ми його домоглися.',
        ]);
        Post::updateOrCreate([
            'title' => 'У пабі з пивом: Зеленський вболівав за збірну України в компанії Єрмака',
        ], [
            'text' => 'За важливим матчем національної збірної президент стежив в одному зі столичних пабів разом з іншими відвідувачами. Учора, 16 листопада, збірна України з футболу обіграла збірну Боснії та Герцеговини з рахунком 2:0. Президент Володимир Зеленський стежив за вирішальним матчем в одному зі столичних пабів.  Про це повідомила одна з відвідувачок закладу в Instagram.

Жінка опублікувала світлину, на якій Зеленський вболіває за збірну України з футболу у компанії голови Офісу президента Андрія Єрмака.

Обидва влаштували собі класичний вечір вболівальника. Компанія замовила пива та снеків.',
        ]);
    }
}
