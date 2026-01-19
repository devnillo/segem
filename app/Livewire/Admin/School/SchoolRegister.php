<?php

namespace App\Livewire\Admin\School;

use App\Http\Requests\SchoolRegisterRequest;
use App\Http\Services\SchoolService;
use Livewire\Component;

class SchoolRegister extends Component
{
    // 1. Identification
    public int $record_type; // Sempre 10
    public string $name = '';
    public string $inep_code;

// 2. Operating Location
    public int $is_school_building;
    public int $has_rooms_in_other_school;
    public int $has_shack_or_similar;
    public int $is_socio_educational_unit;
    public int $is_prison_unit;
    public int $is_other_location;

// 3. Occupation and Sharing
    public ?int $building_occupation_type = null;
    public ?int $is_shared_building = null;
    public ?string $shared_school_inep_1 = '';
    public ?string $shared_school_inep_2 = '';
    public ?string $shared_school_inep_3 = '';
    public ?string $shared_school_inep_4 = '';
    public ?string $shared_school_inep_5 = '';
    public ?string $shared_school_inep_6 = '';

// 4. Water Supply
    public int $provides_potable_water;
    public int $water_public_network;
    public int $water_artesian_well;
    public int $water_cistern;
    public int $water_river_source;
    public int $water_truck;
    public int $no_water_supply;

// Energy Source
    public int $energy_public_network;
    public int $energy_fossil_generator;
    public int $energy_renewable_source;
    public int $no_energy_supply;

// 5. Sanitation
    public int $sewer_public_network;
    public int $sewer_septic_tank;
    public int $sewer_rudimentary_tank;
    public int $no_sewer_system;

// 6. Waste Management
    public int $waste_collection_service;
    public int $waste_burning;
    public int $waste_burying;
    public int $waste_licensed_destination;
    public int $waste_other_area_disposal;
    public ?int $waste_separation = null;
    public ?int $waste_reuse = null;
    public ?int $waste_recycling = null;
    public ?int $no_waste_treatment = null;

// 7. Physical Facilities
    public int $has_warehouse;
    public int $has_green_area;
    public int $has_auditorium;
    public int $has_bathroom;
    public int $has_pcd_bathroom;
    public int $has_childhood_education_bathroom;
    public int $has_staff_bathroom;
    public int $has_shower_room;
    public int $has_library;
    public int $has_kitchen;
    public int $has_pantry;
    public int $has_student_dormitory;
    public int $has_teacher_dormitory;
    public int $has_science_lab;
    public int $has_it_lab;
    public int $has_vocational_lab;
    public int $has_playground;
    public int $has_covered_patio;
    public int $has_uncovered_patio;
    public int $has_swimming_pool;
    public int $has_covered_sports_court;
    public int $has_uncovered_sports_court;
    public int $has_cafeteria;
    public int $has_student_rest_room;
    public int $has_arts_studio;
    public int $has_music_room;
    public int $has_dance_studio;
    public int $has_multipurpose_room;
    public int $has_open_dirt_field;
    public int $has_animal_breeding_area;
    public int $has_principals_office;
    public int $has_reading_room;
    public int $has_teachers_lounge;
    public int $has_special_education_resource_room;
    public int $has_secretarys_office;
    public int $has_vocational_workshop_rooms;
    public int $has_recording_studio;
    public int $has_agricultural_production_area;
    public int $has_none_of_the_facilities;

// 8. Accessibility
    public int $acc_handrails_guardrails;
    public int $acc_elevator;
    public int $acc_tactile_floors;
    public int $acc_wide_doors_80cm;
    public int $acc_ramps;
    public int $acc_visual_alarm;
    public int $acc_audio_alarm;
    public int $acc_tactile_signage;
    public int $acc_visual_signage;
    public int $no_accessibility_resources;

// 9. Classrooms and Equipment
    public ?int $qty_classrooms_inside = 0;
    public ?int $qty_classrooms_outside = 0;
    public ?int $qty_classrooms_air_conditioned = 0;
    public ?int $qty_classrooms_pcd_accessible = 0;
    public int $has_satellite_dish;
    public int $has_computers;
    public int $has_photocopier;
    public int $has_printer;
    public int $has_multifunctional_printer;
    public int $has_scanner;
    public int $has_none_of_the_equipment;
    public ?int $qty_dvd_bluray_players = 0;
    public ?int $qty_sound_systems = 0;
    public ?int $qty_tvs = 0;
    public ?int $qty_digital_whiteboards = 0;
    public ?int $qty_multimedia_projectors = 0;
    public ?int $qty_desktop_computers_for_students = 0;
    public ?int $qty_laptop_computers_for_students = 0;
    public ?int $qty_tablets_for_students = 0;

// 10. Internet Access
    public int $internet_admin_use;
    public int $internet_learning_use;
    public int $internet_student_use;
    public int $internet_community_use;
    public int $no_internet_access;
    public ?int $internet_via_school_devices = null;
    public ?int $internet_via_personal_devices = null;
    public ?int $has_broadband = null;
    public ?int $has_wired_lan = null;
    public ?int $has_wireless_lan = null;
    public ?int $no_local_network = null;

// 11. Staff Quantities
    public int $staff_agronomists = 0;
    public int $staff_secretarial_admin_assistants = 0;
    public int $staff_general_services_maintenance = 0;
    public int $staff_librarians_reading_monitors = 0;
    public int $staff_health_emergency_professionals = 0;
    public int $staff_shift_coordinators = 0;
    public int $staff_speech_therapists = 0;
    public int $staff_nutritionists = 0;
    public int $staff_psychologists = 0;
    public int $staff_cooks_kitchen_assistants = 0;
    public int $staff_pedagogical_supervisors = 0;
    public int $staff_school_secretary = 0;
    public int $staff_security_guards = 0;
    public int $staff_it_multimedia_technicians = 0;
    public int $staff_vice_principals = 0;
    public int $staff_community_counselors_social_workers = 0;
    public int $staff_libras_interpreters = 0;
    public int $staff_braille_translators_assistants = 0;
    public ?int $no_staff_in_listed_functions = null;

// 12. Meals and Materials
    public int $provides_school_meals;
    public int $has_multimedia_collection;
    public int $has_early_childhood_toys;
    public int $has_scientific_materials_kit;
    public int $has_sound_amplification_equipment;
    public int $has_agricultural_production_equipment;
    public int $has_musical_instruments;
    public int $has_educational_games;
    public int $has_artistic_cultural_materials;
    public int $has_vocational_education_materials;
    public int $has_sports_recreation_materials;
    public int $has_deaf_bilingual_education_materials;
    public int $has_indigenous_education_materials;
    public int $has_ethnic_racial_relations_materials;
    public int $has_rural_education_materials;
    public int $has_quilombola_education_materials;
    public int $has_special_education_materials;
    public int $has_none_of_the_pedagogical_materials;

// 13. Indigenous and Languages
    public int $is_indigenous_school;
    public ?int $teaching_in_indigenous_language = null;
    public ?int $teaching_in_portuguese = null;
    public ?string $indigenous_language_code_1 = '';
    public ?string $indigenous_language_code_2 = '';
    public ?string $indigenous_language_code_3 = '';

// 14. Selection and Quotas
    public ?int $has_entrance_exam = null;
    public ?int $quota_ppi = null;
    public ?int $quota_income = null;
    public ?int $quota_public_school = null;
    public ?int $quota_pcd = null;
    public ?int $quota_other_groups = null;
    public ?int $no_quotas = null;

// 15. Management
    public ?int $has_website_or_social_media = null;
    public ?int $shares_space_with_community = null;
    public ?int $uses_neighborhood_facilities = null;
    public int $has_parents_association;
    public int $has_parents_teachers_association;
    public int $has_school_council;
    public int $has_student_union;
    public int $has_other_collegial_bodies;
    public int $no_collegial_bodies;

// 16. PPP and Environment
    public ?int $ppp_updated_last_12_months = null;
    public int $has_environmental_education;
    public ?int $env_as_curriculum_content = null;
    public ?int $env_as_specific_subject = null;
    public ?int $env_as_structural_axis = null;
    public ?int $env_via_events = null;
    public ?int $env_via_transdisciplinary_projects = null;
    public ?int $env_none_of_the_options = null;

    protected function rules(): array
    {
        return [
            // 1. Identificação (Fields 1-2)
            'record_type' => 'required|string|size:2|in:10',
            'inep_code' => 'required|string|size:8|unique:schools',
            'name' => 'required|string',
            // 2. Operating Location (Fields 3-8)
            'is_school_building' => 'required|integer|in:0,1',
            'has_rooms_in_other_school' => 'required|integer|in:0,1',
            'has_shack_or_similar' => 'required|integer|in:0,1',
            'is_socio_educational_unit' => 'required|integer|in:0,1',
            'is_prison_unit' => 'required|integer|in:0,1',
            'is_other_location' => 'required|integer|in:0,1',

            // 3. Occupation and Sharing (Fields 9-16)
            'building_occupation_type' => 'nullable|integer|in:1,2,3',
            'is_shared_building' => 'nullable|integer|in:0,1',
            'shared_school_inep_1' => 'nullable|string|size:8',
            'shared_school_inep_2' => 'nullable|string|size:8',
            'shared_school_inep_3' => 'nullable|string|size:8',
            'shared_school_inep_4' => 'nullable|string|size:8',
            'shared_school_inep_5' => 'nullable|string|size:8',
            'shared_school_inep_6' => 'nullable|string|size:8',

            // 4. Water Supply (Fields 17-23)
            'provides_potable_water' => 'required|integer|in:0,1',
            'water_public_network' => 'required|integer|in:0,1',
            'water_artesian_well' => 'required|integer|in:0,1',
            'water_cistern' => 'required|integer|in:0,1',
            'water_river_source' => 'required|integer|in:0,1',
            'water_truck' => 'required|integer|in:0,1',
            'no_water_supply' => 'required|integer|in:0,1',

            // Energy Source (Fields 24-27)
            'energy_public_network' => 'required|integer|in:0,1',
            'energy_fossil_generator' => 'required|integer|in:0,1',
            'energy_renewable_source' => 'required|integer|in:0,1',
            'no_energy_supply' => 'required|integer|in:0,1',

            // 5. Sanitation (Fields 28-31)
            'sewer_public_network' => 'required|integer|in:0,1',
            'sewer_septic_tank' => 'required|integer|in:0,1',
            'sewer_rudimentary_tank' => 'required|integer|in:0,1',
            'no_sewer_system' => 'required|integer|in:0,1',

            // 6. Waste Management (Fields 32-40)
            'waste_collection_service' => 'required|integer|in:0,1',
            'waste_burning' => 'required|integer|in:0,1',
            'waste_burying' => 'required|integer|in:0,1',
            'waste_licensed_destination' => 'required|integer|in:0,1',
            'waste_other_area_disposal' => 'required|integer|in:0,1',
            'waste_separation' => 'nullable|integer|in:0,1',
            'waste_reuse' => 'nullable|integer|in:0,1',
            'waste_recycling' => 'nullable|integer|in:0,1',
            'no_waste_treatment' => 'nullable|integer|in:0,1',

            // 7. Physical Facilities (Fields 41-79)
            'has_warehouse' => 'required|integer|in:0,1',
            'has_green_area' => 'required|integer|in:0,1',
            'has_auditorium' => 'required|integer|in:0,1',
            'has_bathroom' => 'required|integer|in:0,1',
            'has_pcd_bathroom' => 'required|integer|in:0,1',
            'has_childhood_education_bathroom' => 'required|integer|in:0,1',
            'has_staff_bathroom' => 'required|integer|in:0,1',
            'has_shower_room' => 'required|integer|in:0,1',
            'has_library' => 'required|integer|in:0,1',
            'has_kitchen' => 'required|integer|in:0,1',
            'has_pantry' => 'required|integer|in:0,1',
            'has_student_dormitory' => 'required|integer|in:0,1',
            'has_teacher_dormitory' => 'required|integer|in:0,1',
            'has_science_lab' => 'required|integer|in:0,1',
            'has_it_lab' => 'required|integer|in:0,1',
            'has_vocational_lab' => 'required|integer|in:0,1',
            'has_playground' => 'required|integer|in:0,1',
            'has_covered_patio' => 'required|integer|in:0,1',
            'has_uncovered_patio' => 'required|integer|in:0,1',
            'has_swimming_pool' => 'required|integer|in:0,1',
            'has_covered_sports_court' => 'required|integer|in:0,1',
            'has_uncovered_sports_court' => 'required|integer|in:0,1',
            'has_cafeteria' => 'required|integer|in:0,1',
            'has_student_rest_room' => 'required|integer|in:0,1',
            'has_arts_studio' => 'required|integer|in:0,1',
            'has_music_room' => 'required|integer|in:0,1',
            'has_dance_studio' => 'required|integer|in:0,1',
            'has_multipurpose_room' => 'required|integer|in:0,1',
            'has_open_dirt_field' => 'required|integer|in:0,1',
            'has_animal_breeding_area' => 'required|integer|in:0,1',
            'has_principals_office' => 'required|integer|in:0,1',
            'has_reading_room' => 'required|integer|in:0,1',
            'has_teachers_lounge' => 'required|integer|in:0,1',
            'has_special_education_resource_room' => 'required|integer|in:0,1',
            'has_secretarys_office' => 'required|integer|in:0,1',
            'has_vocational_workshop_rooms' => 'required|integer|in:0,1',
            'has_recording_studio' => 'required|integer|in:0,1',
            'has_agricultural_production_area' => 'required|integer|in:0,1',
            'has_none_of_the_facilities' => 'required|integer|in:0,1',

            // 8. Accessibility (Fields 80-89)
            'acc_handrails_guardrails' => 'required|integer|in:0,1',
            'acc_elevator' => 'required|integer|in:0,1',
            'acc_tactile_floors' => 'required|integer|in:0,1',
            'acc_wide_doors_80cm' => 'required|integer|in:0,1',
            'acc_ramps' => 'required|integer|in:0,1',
            'acc_visual_alarm' => 'required|integer|in:0,1',
            'acc_audio_alarm' => 'required|integer|in:0,1',
            'acc_tactile_signage' => 'required|integer|in:0,1',
            'acc_visual_signage' => 'required|integer|in:0,1',
            'no_accessibility_resources' => 'required|integer|in:0,1',

            // 9. Classrooms and Equipment (Fields 90-108)
            'qty_classrooms_inside' => 'nullable|integer|min:0|max:9999',
            'qty_classrooms_outside' => 'nullable|integer|min:0|max:9999',
            'qty_classrooms_air_conditioned' => 'nullable|integer|min:0|max:9999',
            'qty_classrooms_pcd_accessible' => 'nullable|integer|min:0|max:9999',
            'has_satellite_dish' => 'required|integer|in:0,1',
            'has_computers' => 'required|integer|in:0,1',
            'has_photocopier' => 'required|integer|in:0,1',
            'has_printer' => 'required|integer|in:0,1',
            'has_multifunctional_printer' => 'required|integer|in:0,1',
            'has_scanner' => 'required|integer|in:0,1',
            'has_none_of_the_equipment' => 'required|integer|in:0,1',
            'qty_dvd_bluray_players' => 'nullable|integer|min:0|max:9999',
            'qty_sound_systems' => 'nullable|integer|min:0|max:9999',
            'qty_tvs' => 'nullable|integer|min:0|max:9999',
            'qty_digital_whiteboards' => 'nullable|integer|min:0|max:9999',
            'qty_multimedia_projectors' => 'nullable|integer|min:0|max:9999',
            'qty_desktop_computers_for_students' => 'nullable|integer|min:0|max:9999',
            'qty_laptop_computers_for_students' => 'nullable|integer|min:0|max:9999',
            'qty_tablets_for_students' => 'nullable|integer|min:0|max:9999',

            // 10. Internet Access (Fields 109-119)
            'internet_admin_use' => 'required|integer|in:0,1',
            'internet_learning_use' => 'required|integer|in:0,1',
            'internet_student_use' => 'required|integer|in:0,1',
            'internet_community_use' => 'required|integer|in:0,1',
            'no_internet_access' => 'required|integer|in:0,1',
            'internet_via_school_devices' => 'nullable|integer|in:0,1',
            'internet_via_personal_devices' => 'nullable|integer|in:0,1',
            'has_broadband' => 'nullable|integer|in:0,1',
            'has_wired_lan' => 'nullable|integer|in:0,1',
            'has_wireless_lan' => 'nullable|integer|in:0,1',
            'no_local_network' => 'nullable|integer|in:0,1',

            // 11. Staff (Fields 120-138)
            'staff_agronomists' => 'integer|min:0|max:9999',
            'staff_secretarial_admin_assistants' => 'integer|min:0|max:9999',
            'staff_general_services_maintenance' => 'integer|min:0|max:9999',
            'staff_librarians_reading_monitors' => 'integer|min:0|max:9999',
            'staff_health_emergency_professionals' => 'integer|min:0|max:9999',
            'staff_shift_coordinators' => 'integer|min:0|max:9999',
            'staff_speech_therapists' => 'integer|min:0|max:9999',
            'staff_nutritionists' => 'integer|min:0|max:9999',
            'staff_psychologists' => 'integer|min:0|max:9999',
            'staff_cooks_kitchen_assistants' => 'integer|min:0|max:9999',
            'staff_pedagogical_supervisors' => 'integer|min:0|max:9999',
            'staff_school_secretary' => 'integer|min:0|max:9999',
            'staff_security_guards' => 'integer|min:0|max:9999',
            'staff_it_multimedia_technicians' => 'integer|min:0|max:9999',
            'staff_vice_principals' => 'integer|min:0|max:9999',
            'staff_community_counselors_social_workers' => 'integer|min:0|max:9999',
            'staff_libras_interpreters' => 'integer|min:0|max:9999',
            'staff_braille_translators_assistants' => 'integer|min:0|max:9999',
            'no_staff_in_listed_functions' => 'nullable|integer|in:0,1',

            // 12. School Meals and Pedagogical Materials (Fields 139-156)
            'provides_school_meals' => 'required|integer|in:0,1',
            'has_multimedia_collection' => 'required|integer|in:0,1',
            'has_early_childhood_toys' => 'required|integer|in:0,1',
            'has_scientific_materials_kit' => 'required|integer|in:0,1',
            'has_sound_amplification_equipment' => 'required|integer|in:0,1',
            'has_agricultural_production_equipment' => 'required|integer|in:0,1',
            'has_musical_instruments' => 'required|integer|in:0,1',
            'has_educational_games' => 'required|integer|in:0,1',
            'has_artistic_cultural_materials' => 'required|integer|in:0,1',
            'has_vocational_education_materials' => 'required|integer|in:0,1',
            'has_sports_recreation_materials' => 'required|integer|in:0,1',
            'has_deaf_bilingual_education_materials' => 'required|integer|in:0,1',
            'has_indigenous_education_materials' => 'required|integer|in:0,1',
            'has_ethnic_racial_relations_materials' => 'required|integer|in:0,1',
            'has_rural_education_materials' => 'required|integer|in:0,1',
            'has_quilombola_education_materials' => 'required|integer|in:0,1',
            'has_special_education_materials' => 'required|integer|in:0,1',
            'has_none_of_the_pedagogical_materials' => 'required|integer|in:0,1',

            // 13. Indigenous School and Languages (Fields 157-162)
            'is_indigenous_school' => 'required|integer|in:0,1',
            'teaching_in_indigenous_language' => 'nullable|integer|in:0,1',
            'teaching_in_portuguese' => 'nullable|integer|in:0,1',
            'indigenous_language_code_1' => 'nullable|string|size:5',
            'indigenous_language_code_2' => 'nullable|string|size:5',
            'indigenous_language_code_3' => 'nullable|string|size:5',

            // 14. Student Selection and Quotas (Fields 163-169)
            'has_entrance_exam' => 'nullable|integer|in:0,1',
            'quota_ppi' => 'nullable|integer|in:0,1',
            'quota_income' => 'nullable|integer|in:0,1',
            'quota_public_school' => 'nullable|integer|in:0,1',
            'quota_pcd' => 'nullable|integer|in:0,1',
            'quota_other_groups' => 'nullable|integer|in:0,1',
            'no_quotas' => 'nullable|integer|in:0,1',

            // 15. Management and Communication (Fields 170-178)
            'has_website_or_social_media' => 'nullable|integer|in:0,1',
            'shares_space_with_community' => 'nullable|integer|in:0,1',
            'uses_neighborhood_facilities' => 'nullable|integer|in:0,1',
            'has_parents_association' => 'required|integer|in:0,1',
            'has_parents_teachers_association' => 'required|integer|in:0,1',
            'has_school_council' => 'required|integer|in:0,1',
            'has_student_union' => 'required|integer|in:0,1',
            'has_other_collegial_bodies' => 'required|integer|in:0,1',
            'no_collegial_bodies' => 'required|integer|in:0,1',

            // 16. PPP and Environmental Education (Fields 179-186)
            'ppp_updated_last_12_months' => 'nullable|integer|in:0,1',
            'has_environmental_education' => 'required|integer|in:0,1',
            'env_as_curriculum_content' => 'nullable|integer|in:0,1',
            'env_as_specific_subject' => 'nullable|integer|in:0,1',
            'env_as_structural_axis' => 'nullable|integer|in:0,1',
            'env_via_events' => 'nullable|integer|in:0,1',
            'env_via_transdisciplinary_projects' => 'nullable|integer|in:0,1',
            'env_none_of_the_options' => 'nullable|integer|in:0,1',
        ];
    }

    public function register(SchoolService $schoolService)
    {

        $this->validate();
        $schoolService->register();
    }
    public function render()
    {
        return view('livewire.admin.school.school-register');
    }
}
