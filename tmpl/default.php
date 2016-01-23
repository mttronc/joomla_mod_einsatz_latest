<?php
defined('_JEXEC') or die('Restricted Access');
?>

<style>
div.einsatz_latest {
	<?php if ($display['templatecolor'] != '1') echo 'color: #'.$colortext.';'."\n"; ?>
	width: <?php echo $modulewidth; ?>;
}
div.einsatz_latest:hover {
	background-color: #F5F5FF;
	cursor: pointer;
}
hr.einsatz_latest {
	color: transparent;
	clear: both;
}
hr.separator1 {
	border: 0;
	border-bottom: 1px dashed <?php echo $separatorcolor; ?>;
}
hr.separator2 {
	border: 0;
	border-bottom: 1px solid <?php echo $separatorcolor; ?>;
}
div.einsatz_latest span {
	font-weight: bold;
}
div.einsatz_latest a {
	<?php if ($display['templatecolor'] != '1') echo 'color: #'.$coloralert.' !important;'."\n"; ?>
}
div.einsatz_latest p {
	margin: 0px 10px 0px 10px;
}
div.einsatz_latest img {
	margin: 2px 10px 8px 10px;
	height: auto;
	width: <?php echo $bild_breite; ?>;
	float: <?php echo $bild_float; ?>;
}
</style>

<?php foreach ($frontReports as $report) : ?>
	<?php $alerttime = strtotime($report->date1); ?>
	<div class="einsatz_latest<?php echo $moduleclass_sfx; ?>" onclick="parent.location='<?php echo $report->link; ?>'">

	<?php if (($bild=='1') and ($report->image) and !(strpos($report->image,'nopic'))) : ?>
		<a href="<?php echo $report->link; ?>">
		<img src="<?php echo $report->image; ?>" />
		</a>
	<?php endif; ?>

	<p>
	<span><?php echo date('d.m.Y', $alerttime); ?></span>

	<?php if ($display['date1']) : ?>
		<?php echo ' um '.date('H:i', $alerttime).' Uhr'; ?>
	<?php endif; ?>
	<br />

	<?php if ($display['address']) : ?>
		<?php echo $report->address; ?><br />
	<?php endif; ?>

	<?php if ($display['einsatzart']) : ?>
		<b><?php echo $report->title; ?></b><br />
	<?php endif; ?>

	<?php if ($display['summary']) : ?>
		<a href="<?php echo $report->link; ?>"><b><?php echo $report->summary; ?></b></a><br />
	<?php endif; ?>

	<?php if (($display['desc']) and ($report->desc)) : ?>
		<?php echo $report->desc; ?> <b>...</b>
	<?php endif; ?>

	<?php if ($readontext) : ?>
		<a href="<?php echo $report->link ?>"><?php echo $readontext ?></a>
	<?php endif; ?>

	</p></div>
	<hr class="einsatz_latest separator<?php echo $separator; ?>">
<?php endforeach; ?>
