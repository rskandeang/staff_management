<?php
echo $this->Paginator->counter('<label>'.'total'.' <span class="badge">{:count}</span>&nbsp;'.'page'.'&nbsp;{:page}&nbsp;'. 'of'.'&nbsp; {:pages}</label><br/>');
echo '<div class="paging">';
echo $this->Paginator->prev('< ' . __('Previous'), array(), null, array('class' => 'prev disabled'));
echo $this->Paginator->numbers(array('separator' => '', 'modulus' => 3));
echo $this->Paginator->next(__('Next') . ' >', array(), null, array('class' => 'next disabled',));
echo '<br/><br/>';
echo '</div>';