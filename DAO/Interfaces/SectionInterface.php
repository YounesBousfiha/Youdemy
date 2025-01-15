<?php

namespace Younes\Youdemy\DAO\Interfaces;

interface SectionInterface
{
    public function markAsDone($section_id);
    public function undone($section_id);
}