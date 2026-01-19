<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateSchoolsTable extends Migration
{

    public function up()
    {
    Schema::create('schools', function (Blueprint $table) {
        $table->id();
        $table->foreignId('department_id')->constrained('departments');
        // 1. Identification (Fields 1-2)
        $table->string('record_type', 2)->default('10'); // Field 1: Must be '10'
        $table->char('inep_code', 8)->unique(); // Field 2: Fixed length numeric

        $table->string('name')->after('inep_code');

        // 2. Operating Location (Fields 3-8)
        $table->unsignedTinyInteger('is_school_building');
        $table->unsignedTinyInteger('has_rooms_in_other_school');
        $table->unsignedTinyInteger('has_shack_or_similar');
        $table->unsignedTinyInteger('is_socio_educational_unit');
        $table->unsignedTinyInteger('is_prison_unit');
        $table->unsignedTinyInteger('is_other_location');

        // 3. Occupation and Sharing (Fields 9-16) [cite: 1, 2, 3]
        $table->unsignedTinyInteger('building_occupation_type')->nullable();
        $table->unsignedTinyInteger('is_shared_building')->nullable();
        $table->char('shared_school_inep_1', 8)->nullable();
        $table->char('shared_school_inep_2', 8)->nullable();
        $table->char('shared_school_inep_3', 8)->nullable();
        $table->char('shared_school_inep_4', 8)->nullable();
        $table->char('shared_school_inep_5', 8)->nullable();
        $table->char('shared_school_inep_6', 8)->nullable();

        // 4. Water Supply (Fields 17-23) [cite: 4, 5]
        $table->unsignedTinyInteger('provides_potable_water');
        $table->unsignedTinyInteger('water_public_network');
        $table->unsignedTinyInteger('water_artesian_well');
        $table->unsignedTinyInteger('water_cistern');
        $table->unsignedTinyInteger('water_river_source');
        $table->unsignedTinyInteger('water_truck');
        $table->unsignedTinyInteger('no_water_supply');

        //  energy Source (Fields 24-27) [cite: 5]
        $table->unsignedTinyInteger('energy_public_network');
        $table->unsignedTinyInteger('energy_fossil_generator');
        $table->unsignedTinyInteger('energy_renewable_source');
        $table->unsignedTinyInteger('no_energy_supply');

        // 5. Sanitation (Fields 28-31) [cite: 6]
        $table->unsignedTinyInteger('sewer_public_network');
        $table->unsignedTinyInteger('sewer_septic_tank');
        $table->unsignedTinyInteger('sewer_rudimentary_tank');
        $table->unsignedTinyInteger('no_sewer_system');

        // 6. Waste Management (Fields 32-40) [cite: 6, 7, 8]
        $table->unsignedTinyInteger('waste_collection_service');
        $table->unsignedTinyInteger('waste_burning');
        $table->unsignedTinyInteger('waste_burying');
        $table->unsignedTinyInteger('waste_licensed_destination');
        $table->unsignedTinyInteger('waste_other_area_disposal');
        $table->unsignedTinyInteger('waste_separation')->nullable();
        $table->unsignedTinyInteger('waste_reuse')->nullable();
        $table->unsignedTinyInteger('waste_recycling')->nullable();
        $table->unsignedTinyInteger('no_waste_treatment')->nullable();

        // 7. Physical Facilities (Fields 41-79) [cite: 8-15]
        $table->unsignedTinyInteger('has_warehouse');
        $table->unsignedTinyInteger('has_green_area');
        $table->unsignedTinyInteger('has_auditorium');
        $table->unsignedTinyInteger('has_bathroom');
        $table->unsignedTinyInteger('has_pcd_bathroom');
        $table->unsignedTinyInteger('has_childhood_education_bathroom');
        $table->unsignedTinyInteger('has_staff_bathroom');
        $table->unsignedTinyInteger('has_shower_room');
        $table->unsignedTinyInteger('has_library');
        $table->unsignedTinyInteger('has_kitchen');
        $table->unsignedTinyInteger('has_pantry');
        $table->unsignedTinyInteger('has_student_dormitory');
        $table->unsignedTinyInteger('has_teacher_dormitory');
        $table->unsignedTinyInteger('has_science_lab');
        $table->unsignedTinyInteger('has_it_lab');
        $table->unsignedTinyInteger('has_vocational_lab');
        $table->unsignedTinyInteger('has_playground');
        $table->unsignedTinyInteger('has_covered_patio');
        $table->unsignedTinyInteger('has_uncovered_patio');
        $table->unsignedTinyInteger('has_swimming_pool');
        $table->unsignedTinyInteger('has_covered_sports_court');
        $table->unsignedTinyInteger('has_uncovered_sports_court');
        $table->unsignedTinyInteger('has_cafeteria');
        $table->unsignedTinyInteger('has_student_rest_room');
        $table->unsignedTinyInteger('has_arts_studio');
        $table->unsignedTinyInteger('has_music_room');
        $table->unsignedTinyInteger('has_dance_studio');
        $table->unsignedTinyInteger('has_multipurpose_room');
        $table->unsignedTinyInteger('has_open_dirt_field');
        $table->unsignedTinyInteger('has_animal_breeding_area');
        $table->unsignedTinyInteger('has_principals_office');
        $table->unsignedTinyInteger('has_reading_room');
        $table->unsignedTinyInteger('has_teachers_lounge');
        $table->unsignedTinyInteger('has_special_education_resource_room');
        $table->unsignedTinyInteger('has_secretarys_office');
        $table->unsignedTinyInteger('has_vocational_workshop_rooms');
        $table->unsignedTinyInteger('has_recording_studio');
        $table->unsignedTinyInteger('has_agricultural_production_area');
        $table->unsignedTinyInteger('has_none_of_the_facilities');

        // 8. Accessibility (Fields 80-89) [cite: 15, 16, 17]
        $table->unsignedTinyInteger('acc_handrails_guardrails');
        $table->unsignedTinyInteger('acc_elevator');
        $table->unsignedTinyInteger('acc_tactile_floors');
        $table->unsignedTinyInteger('acc_wide_doors_80cm');
        $table->unsignedTinyInteger('acc_ramps');
        $table->unsignedTinyInteger('acc_visual_alarm');
        $table->unsignedTinyInteger('acc_audio_alarm');
        $table->unsignedTinyInteger('acc_tactile_signage');
        $table->unsignedTinyInteger('acc_visual_signage');
        $table->unsignedTinyInteger('no_accessibility_resources');

        // 9. Classrooms and Equipment (Fields 90-108) [cite: 17-20]
        $table->unsignedSmallInteger('qty_classrooms_inside')->nullable();
        $table->unsignedSmallInteger('qty_classrooms_outside')->nullable();
        $table->unsignedSmallInteger('qty_classrooms_air_conditioned')->nullable();
        $table->unsignedSmallInteger('qty_classrooms_pcd_accessible')->nullable();
        $table->unsignedTinyInteger('has_satellite_dish');
        $table->unsignedTinyInteger('has_computers');
        $table->unsignedTinyInteger('has_photocopier');
        $table->unsignedTinyInteger('has_printer');
        $table->unsignedTinyInteger('has_multifunctional_printer');
        $table->unsignedTinyInteger('has_scanner');
        $table->unsignedTinyInteger('has_none_of_the_equipment');
        $table->unsignedSmallInteger('qty_dvd_bluray_players')->nullable();
        $table->unsignedSmallInteger('qty_sound_systems')->nullable();
        $table->unsignedSmallInteger('qty_tvs')->nullable();
        $table->unsignedSmallInteger('qty_digital_whiteboards')->nullable();
        $table->unsignedSmallInteger('qty_multimedia_projectors')->nullable();
        $table->unsignedSmallInteger('qty_desktop_computers_for_students')->nullable();
        $table->unsignedSmallInteger('qty_laptop_computers_for_students')->nullable();
        $table->unsignedSmallInteger('qty_tablets_for_students')->nullable();

        // 10. Internet Access (Fields 109-119) [cite: 21, 22, 23]
        $table->unsignedTinyInteger('internet_admin_use');
        $table->unsignedTinyInteger('internet_learning_use');
        $table->unsignedTinyInteger('internet_student_use');
        $table->unsignedTinyInteger('internet_community_use');
        $table->unsignedTinyInteger('no_internet_access');
        $table->unsignedTinyInteger('internet_via_school_devices')->nullable();
        $table->unsignedTinyInteger('internet_via_personal_devices')->nullable();
        $table->unsignedTinyInteger('has_broadband')->nullable();
        $table->unsignedTinyInteger('has_wired_lan')->nullable();
        $table->unsignedTinyInteger('has_wireless_lan')->nullable();
        $table->unsignedTinyInteger('no_local_network')->nullable();

        // 11. Staff (Fields 120-138) [cite: 23, 24, 25]
        $table->unsignedSmallInteger('staff_agronomists')->default(0);
        $table->unsignedSmallInteger('staff_secretarial_admin_assistants')->default(0);
        $table->unsignedSmallInteger('staff_general_services_maintenance')->default(0);
        $table->unsignedSmallInteger('staff_librarians_reading_monitors')->default(0);
        $table->unsignedSmallInteger('staff_health_emergency_professionals')->default(0);
        $table->unsignedSmallInteger('staff_shift_coordinators')->default(0);
        $table->unsignedSmallInteger('staff_speech_therapists')->default(0);
        $table->unsignedSmallInteger('staff_nutritionists')->default(0);
        $table->unsignedSmallInteger('staff_psychologists')->default(0);
        $table->unsignedSmallInteger('staff_cooks_kitchen_assistants')->default(0);
        $table->unsignedSmallInteger('staff_pedagogical_supervisors')->default(0);
        $table->unsignedSmallInteger('staff_school_secretary')->default(0);
        $table->unsignedSmallInteger('staff_security_guards')->default(0);
        $table->unsignedSmallInteger('staff_it_multimedia_technicians')->default(0);
        $table->unsignedSmallInteger('staff_vice_principals')->default(0);
        $table->unsignedSmallInteger('staff_community_counselors_social_workers')->default(0);
        $table->unsignedSmallInteger('staff_libras_interpreters')->default(0);
        $table->unsignedSmallInteger('staff_braille_translators_assistants')->default(0);
        $table->unsignedTinyInteger('no_staff_in_listed_functions')->nullable();

        // 12. School Meals and Pedagogical Materials (Fields 139-156) [cite: 25-29]
        $table->unsignedTinyInteger('provides_school_meals');
        $table->unsignedTinyInteger('has_multimedia_collection');
        $table->unsignedTinyInteger('has_early_childhood_toys');
        $table->unsignedTinyInteger('has_scientific_materials_kit');
        $table->unsignedTinyInteger('has_sound_amplification_equipment');
        $table->unsignedTinyInteger('has_agricultural_production_equipment');
        $table->unsignedTinyInteger('has_musical_instruments');
        $table->unsignedTinyInteger('has_educational_games');
        $table->unsignedTinyInteger('has_artistic_cultural_materials');
        $table->unsignedTinyInteger('has_vocational_education_materials');
        $table->unsignedTinyInteger('has_sports_recreation_materials');
        $table->unsignedTinyInteger('has_deaf_bilingual_education_materials');
        $table->unsignedTinyInteger('has_indigenous_education_materials');
        $table->unsignedTinyInteger('has_ethnic_racial_relations_materials');
        $table->unsignedTinyInteger('has_rural_education_materials');
        $table->unsignedTinyInteger('has_quilombola_education_materials');
        $table->unsignedTinyInteger('has_special_education_materials');
        $table->unsignedTinyInteger('has_none_of_the_pedagogical_materials');

        // 13. Indigenous School and Languages (Fields 157-162) [cite: 29, 30]
        $table->unsignedTinyInteger('is_indigenous_school');
        $table->unsignedTinyInteger('teaching_in_indigenous_language')->nullable();
        $table->unsignedTinyInteger('teaching_in_portuguese')->nullable();
        $table->string('indigenous_language_code_1', 5)->nullable();
        $table->string('indigenous_language_code_2', 5)->nullable();
        $table->string('indigenous_language_code_3', 5)->nullable();

        // 14. Student Selection and Quotas (Fields 163-169) [cite: 30, 31, 32]
        $table->unsignedTinyInteger('has_entrance_exam')->nullable();
        $table->unsignedTinyInteger('quota_ppi')->nullable();
        $table->unsignedTinyInteger('quota_income')->nullable();
        $table->unsignedTinyInteger('quota_public_school')->nullable();
        $table->unsignedTinyInteger('quota_pcd')->nullable();
        $table->unsignedTinyInteger('quota_other_groups')->nullable();
        $table->unsignedTinyInteger('no_quotas')->nullable();

        // 15. Management and Communication (Fields 170-178) [cite: 32, 33]
        $table->unsignedTinyInteger('has_website_or_social_media')->nullable();
        $table->unsignedTinyInteger('shares_space_with_community')->nullable();
        $table->unsignedTinyInteger('uses_neighborhood_facilities')->nullable();
        $table->unsignedTinyInteger('has_parents_association');
        $table->unsignedTinyInteger('has_parents_teachers_association');
        $table->unsignedTinyInteger('has_school_council');
        $table->unsignedTinyInteger('has_student_union');
        $table->unsignedTinyInteger('has_other_collegial_bodies');
        $table->unsignedTinyInteger('no_collegial_bodies');

        // 16. PPP and Environmental Education (Fields 179-186) [cite: 33, 34, 35]
        $table->unsignedTinyInteger('ppp_updated_last_12_months')->nullable();
        $table->unsignedTinyInteger('has_environmental_education');
        $table->unsignedTinyInteger('env_as_curriculum_content')->nullable();
        $table->unsignedTinyInteger('env_as_specific_subject')->nullable();
        $table->unsignedTinyInteger('env_as_structural_axis')->nullable();
        $table->unsignedTinyInteger('env_via_events')->nullable();
        $table->unsignedTinyInteger('env_via_transdisciplinary_projects')->nullable();
        $table->unsignedTinyInteger('env_none_of_the_options')->nullable();

        $table->timestamps();
    });

    DB::statement("ALTER TABLE schools ADD CONSTRAINT chk_record_type CHECK (record_type = '10')");

    $boolean_fields = [
        'is_school_building', 'has_rooms_in_other_school', 'has_shack_or_similar', 'is_socio_educational_unit',
        'is_prison_unit', 'is_other_location', 'provides_potable_water', 'water_public_network', 'water_artesian_well',
        'water_cistern', 'water_river_source', 'water_truck', 'no_water_supply', 'energy_public_network',
        'energy_fossil_generator', 'energy_renewable_source', 'no_energy_supply', 'sewer_public_network',
        'sewer_septic_tank', 'sewer_rudimentary_tank', 'no_sewer_system', 'waste_collection_service',
        'has_library', 'has_kitchen', 'provides_school_meals', 'is_indigenous_school', 'has_environmental_education'
    ];

    foreach ($boolean_fields as $field) {
        DB::statement("ALTER TABLE schools ADD CONSTRAINT chk_{$field} CHECK ({$field} IN (0, 1))");
    }
}

public function down()
    {
        Schema::dropIfExists('schools');
    }
}
