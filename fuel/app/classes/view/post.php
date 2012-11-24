<?php
class View_Post extends ViewModel {

    public function view() {
        $this->tags = Model_Creature::getList();
    }
}
