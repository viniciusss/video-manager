<?php
namespace Vita\VideoManager\Domain\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class VideoUploadType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title')
        ->add('description')
        ->add('file', 'file');
    }

    public function getName()
    {
        return 'videoUpload';
    }
}