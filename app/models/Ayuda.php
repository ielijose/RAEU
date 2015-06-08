<?php
use Carbon\Carbon;

class Ayuda extends Model {

    protected $table = 'helps';
    public $timestamp = true;

    protected $fillable = ['student_id', 'type', 'description', 'status'];

	protected static $rules = [
        'student_id' => 'required',
		'type' => 'required',
    ];

    /* Scopes */

    /* Relationships */

    public function student(){
    	return $this->BelongsTo('Student');
    }

    /* Function */

    public function getHumanDate($column = 'created_at')
    {
        $txt = 'carbon.timediff.';
        $isNow = true;
        $other = Carbon::now();
        $delta = abs($other->diffInSeconds($this->$column));

        $divs = array(
           'second' => Carbon::SECONDS_PER_MINUTE,
           'minute' => Carbon::MINUTES_PER_HOUR,
           'hour'   => Carbon::HOURS_PER_DAY,
           'day'    => 30,
           'month'  => Carbon::MONTHS_PER_YEAR
           );

        $unit = 'year';
        foreach ($divs as $divUnit => $divValue) {
            if ($delta < $divValue) {
                $unit = $divUnit;
                break;
            }

            $delta = floor($delta / $divValue);
        }

        if ($delta == 0) {
            $delta = 1;
        }

        $txt .= $unit;
        return Lang::choice($txt, $delta, compact('delta'));
    }

    public function getStatus()
    {
        switch ($this->status) {
            case 'proccess':
                return '<span class="label label-warning"> En proceso </span>';
                break;

            case 'approved':
                return '<span class="label label-success"> Aprobada </span>';
                break;

            default:
                # code...
                break;
        }
    }

    public function devolver()
    {
        $this->status = 'off';
        $this->book->devolver();
        $this->touch();
        return $this->save();
    }
}