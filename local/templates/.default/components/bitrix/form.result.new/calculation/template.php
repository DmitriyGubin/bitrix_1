<?php 
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die(); 
//debug($arResult);

$ids = ['room_length', 'room_width', 'board_length', 'board_width'];
$ph = ['Enter room length...', 'Enter room width...', 'Enter board length...', 'Enter board width...'];
$i = 0;
?>
<form class="formm" method="post" action="#">
	<p class="errorr" id="all"></p>
	<?php foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion): ?>
		<div>
			<label class="labell" for="<?= $ids[$i]; ?>"><?= $arQuestion['CAPTION']; ?></label>
			<br>
			<input class="inputt" id="<?= $ids[$i]; ?>" name="<?= $ids[$i]; ?>" type="number" placeholder="<?= $ph[$i]; ?>">
			<p class="errorr" id="<?= $ids[$i]; ?>"></p>
			<br>
		</div>
		<?php $i++; ?>
	<?php endforeach; ?>
</form>

<button class="buttonn">Calculate</button>

<div class="result"></div>

