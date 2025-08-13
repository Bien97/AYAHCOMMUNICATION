<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    use HasFactory;

    protected $fillable = [
        // Section 1
        'title', 
        'paragraph',
        'image_about', // Une seule image pour toutes les sections
        
        // Section 2
        'title_2',
        'paragraph_2', 
        
        // Section 3
        'title_3',
        'paragraph_3'
    ];

    /**
     * Vérifie si une section spécifique est remplie
     */
    public function isSectionFilled($sectionNumber)
    {
        $titleField = $sectionNumber == 1 ? 'title' : "title_{$sectionNumber}";
        $paragraphField = $sectionNumber == 1 ? 'paragraph' : "paragraph_{$sectionNumber}";
        
        return !empty($this->$titleField) && !empty($this->$paragraphField);
    }

    /**
     * Retourne le nombre de sections remplies
     */
    public function getFilledSectionsCount()
    {
        $count = 0;
        for ($i = 1; $i <= 3; $i++) {
            if ($this->isSectionFilled($i)) {
                $count++;
            }
        }
        return $count;
    }

    /**
     * Retourne la première section disponible (vide)
     */
    public function getNextAvailableSection()
    {
        for ($i = 1; $i <= 3; $i++) {
            if (!$this->isSectionFilled($i)) {
                return $i;
            }
        }
        return null; // Toutes les sections sont remplies
    }
}