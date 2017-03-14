<?php
    $session = $request->getSession();        
    $session->invalidate();
    header('Location:/');
        