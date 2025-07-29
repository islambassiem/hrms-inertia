<?php

namespace App\Enums;

enum AcademicRank: string
{
    case PROFESSOR = '11';
    case ASSOCIATE_PROFESSOR = '12';
    case ASSISTANT_PROFESSOR = '13';
    case LECTURER = '14';
    case INSTRUCTOR = '15';
    case LANGUAGE_TEACHER = '16';
    case RESEARCHER_ASSISTANT_A = '17';
    case RESEARCHER_ASSISTANT_B = '18';
    case TEACHER_ASSISTANT = '19';
    case TEACHER = '20';
    case TEACHER_FIRST_LEVEL = '21';
    case TEACHER_SECOND_LEVEL = '22';
    case TEACHER_THIRD_LEVEL = '23';
    case TEACHER_FOURTH_LEVEL = '24';
    case TEACHER_FIFTH_LEVEL = '25';
    case TEACHER_SIXTH_LEVEL = '26';
    case ASSISTANT_TEACHER = '27';
    case PRACTICING_TEACHER = '28';
    case ADVANCED_TEACHER = '29';
    case EXPERT_TEACHER = '30';
    case TRAINER = '31';
    case TRAINER_ASSISTANT = '32';
    case TECHNICIAN = '33';
    case NA = '98';
    case OTHER = '99';

    /**
     * @return array<string, string>
     */
    public function label(): array
    {
        return match ($this) {
            self::PROFESSOR => ['id' => '11', 'academic_rank_en' => 'Professor', 'academic_rank_ar' => 'الأستاذ'],
            self::ASSOCIATE_PROFESSOR => ['id' => '12', 'academic_rank_en' => 'Associate Professor', 'academic_rank_ar' => 'الأستاذ عادل'],
            self::ASSISTANT_PROFESSOR => ['id' => '13', 'academic_rank_en' => 'Assistant Professor', 'academic_rank_ar' => 'الأستاذ مساعد'],
            self::LECTURER => ['id' => '14', 'academic_rank_en' => 'Lecturer', 'academic_rank_ar' => 'المحاضر'],
            self::INSTRUCTOR => ['id' => '15', 'academic_rank_en' => 'Instructor', 'academic_rank_ar' => 'المدرس'],
            self::LANGUAGE_TEACHER => ['id' => '16', 'academic_rank_en' => 'Language Teacher', 'academic_rank_ar' => 'معلم لغة'],
            self::RESEARCHER_ASSISTANT_A => ['id' => '17', 'academic_rank_en' => 'Researcher Assistant A', 'academic_rank_ar' => 'مساعد بحث A'],
            self::RESEARCHER_ASSISTANT_B => ['id' => '18', 'academic_rank_en' => 'Researcher Assistant B', 'academic_rank_ar' => 'مساعد بحث B'],
            self::TEACHER_ASSISTANT => ['id' => '19', 'academic_rank_en' => 'Teacher Assistant', 'academic_rank_ar' => 'مساعد مدرس'],
            self::TEACHER => ['id' => '20', 'academic_rank_en' => 'Teacher', 'academic_rank_ar' => 'مدرس'],
            self::TEACHER_FIRST_LEVEL => ['id' => '21', 'academic_rank_en' => 'Teacher First Level', 'academic_rank_ar' => 'مدرس أول'],
            self::TEACHER_SECOND_LEVEL => ['id' => '22', 'academic_rank_en' => 'Teacher Second Level', 'academic_rank_ar' => 'مدرس ثاني'],
            self::TEACHER_THIRD_LEVEL => ['id' => '23', 'academic_rank_en' => 'Teacher Third Level', 'academic_rank_ar' => 'مدرس ثالث'],
            self::TEACHER_FOURTH_LEVEL => ['id' => '24', 'academic_rank_en' => 'Teacher Fourth Level', 'academic_rank_ar' => 'مدرس رابع'],
            self::TEACHER_FIFTH_LEVEL => ['id' => '25', 'academic_rank_en' => 'Teacher Fifth Level', 'academic_rank_ar' => 'مدرس خامس'],
            self::TEACHER_SIXTH_LEVEL => ['id' => '26', 'academic_rank_en' => 'Teacher Sixth Level', 'academic_rank_ar' => 'مدرس سادس'],
            self::ASSISTANT_TEACHER => ['id' => '27', 'academic_rank_en' => 'Assistant Teacher / Teacher', 'academic_rank_ar' => 'مساعد معلم / معلم'],
            self::PRACTICING_TEACHER => ['id' => '28', 'academic_rank_en' => 'Practicing Teacher', 'academic_rank_ar' => 'معلم ممارس'],
            self::ADVANCED_TEACHER => ['id' => '29', 'academic_rank_en' => 'Advanced Teacher', 'academic_rank_ar' => 'معلم متقدم'],
            self::EXPERT_TEACHER => ['id' => '30', 'academic_rank_en' => 'Expert Teacher', 'academic_rank_ar' => 'معلم خبير'],
            self::TRAINER => ['id' => '31', 'academic_rank_en' => 'Trainer', 'academic_rank_ar' => 'مدرب'],
            self::TRAINER_ASSISTANT => ['id' => '32', 'academic_rank_en' => 'Trainer Assistant', 'academic_rank_ar' => 'مساعد مدرب'],
            self::TECHNICIAN => ['id' => '33', 'academic_rank_en' => 'Technician', 'academic_rank_ar' => 'فني'],
            self::NA => ['id' => '98', 'academic_rank_en' => 'N/A', 'academic_rank_ar' => 'غير محدد'],
            self::OTHER => ['id' => '99', 'academic_rank_en' => 'Other', 'academic_rank_ar' => 'أخرى'],
        };
    }

    /**
     * @return array<string>
     */
    public static function toArray(): array
    {
        $array = [];
        foreach (self::cases() as $case) {
            $array[] = $case->value;
        }

        return $array;
    }
}
