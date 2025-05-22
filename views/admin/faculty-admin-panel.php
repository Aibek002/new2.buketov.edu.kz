<?php
/** @var yii\web\View $this */
$this->title = 'Admin Page';
$this->registerCss(<<<CSS
.admin-panel {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
    gap: 20px;
    background: #f9f9f9;
    border-radius: 16px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}
.admin-panel a {
    display: block;
    padding: 20px;
    text-align: center;align-items: center;
    display: flex;
    justify-content: center;
    background-color: #ffffff;
    border-radius: 12px;
    text-decoration: none;
    color: #333;
    font-weight: 500;
    transition: 0.3s ease;
    box-shadow: 0 2px 6px rgba(0,0,0,0.05);
}
.admin-panel a:hover {
    background-color: var(--indigoblue);
    color: #fff;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}
CSS);
?>

<div class="admin-panel p-5 my-5">
    <a href="#"><i class="fas fa-leaf"></i> Биолого-географический</a>
    <a href="#"><i class="fas fa-landmark"></i> Исторический</a>
    <a href="#"><i class="fas fa-language"></i> Иностранных языков</a>
    <a href="#"><i class="fas fa-laptop-code"></i> Математика и ИТ</a>
    <a href="#"><i class="fas fa-chalkboard-teacher"></i> Педагогический</a>
    <a href="#"><i class="fas fa-atom"></i> Физико-технический</a>
    <a href="#"><i class="fas fa-dumbbell"></i> Физкультура и спорт</a>
    <a href="#"><i class="fas fa-book"></i> Филологический</a>
    <a href="#"><i class="fas fa-brain"></i> Философия и психологии</a>
    <a href="#"><i class="fas fa-vial"></i> Химический</a>
    <a href="#"><i class="fas fa-chart-line"></i> Экономический</a>
    <a href="#"><i class="fas fa-gavel"></i> Юридический</a>
    <a href="#"><i class="fas fa-user-graduate"></i> Доп. образование</a>
    <a href="#"><i class="fas fa-shield-alt"></i> Военная кафедра</a>
</div>
