<?php
namespace Packatron\CommunityFabricator\Helpers;

use Packatron\CommunityFabricator\Providers\Entities;

class Language
{
    /**
     *
     */
    public static function generateTranslations()
    {
        $php = "<?php exit;\n";
        foreach (Entities::getAll() as $entity) {
            $php .= "__('{$entity->post_title}','community-fabricator');\n";
            $plural = get_post_meta($entity->ID, 'plural_name', true);
            if ($plural) {
                $php .= "__('{$plural}','community-fabricator');\n";
            }
        }
        file_put_contents(get_template_directory() . '/translations.php', $php);
    }
}


