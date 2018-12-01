<?php

class Calendar extends Controller {
    protected function Index () {
        $viewmodel = new CalendarModel();
        $this->returnView($viewmodel->Index());
    }
}