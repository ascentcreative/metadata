<?php

namespace AscentCreative\Metadata\Traits;

use AscentCreative\CMS\Traits\Extender;

use Illuminate\Http\Request;

use AscentCreative\Metadata\Models\Metadata;

trait HasMetadata {

    use Extender;

    public function initializeHasMetadata() {
        $this->addCapturable('metadata');
    }

    public function saveMetadata($data) {


        if (is_null($data)) {
            return;
        }
        // this isn't an ID based sync. 
        // rather - if a key is not provided here, just leave it alone. Don't delete records
        // record deletion will occur if value provided is null or blank. Any other value will be stored.

        foreach($data as $key=>$value) {

            if(is_null($value) || $value == '') {
                $this->metadata()->where('key', $key)->delete();
            } else {
                Metadata::updateOrCreate([
                    'metadatable_type'=>get_class($this),
                    'metadatable_id'=>$this->id,
                    'key'=>$key,
                ], [
                    'value'=>$value,
                ]);
            }

        }

    }

    public function deleteMetadata() {
        $this->metadata()->delete();
    }

   
    public function metadata() {
        return $this->morphMany(Metadata::class, 'metadatable');
    }
   
    public function getMetadata($key) {
        $md = $this->metadata()->where('key', $key)->first();
        if($md) {
            return $md->value;
        } else {
            return null;
        }
    }

}
