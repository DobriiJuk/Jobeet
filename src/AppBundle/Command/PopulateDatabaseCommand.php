<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use AppBundle\Entity\Category;
use AppBundle\Entity\Job;
use Faker;
use Symfony\Component\Console\Input\InputOption;

class PopulateDatabaseCommand extends ContainerAwareCommand
{
    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('db:init')
            ->setDescription('Initialise Database')
            ->addOption('category-count', 'c', InputOption::VALUE_REQUIRED, 'Number of categories')
            ->addOption('job-count', 'j', InputOption::VALUE_REQUIRED, 'Number of jobs in category');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
       $this->createUsers($input->getOption('category-count'),$input->getOption('job-count'));
    }
    private function createUsers($categoryCount, $jobCount)
    {
        $em=$this->getContainer()->get('doctrine')->getManager();
        $categoryFaker=Faker\Factory::create();
        $jobsCount=$categoryCount*$jobCount;
        while($categoryCount-- >=0)
        {
            $category=new Category();
            $category->setName($categoryFaker->word);
            $em->persist($category);
            while(--$jobsCount>=0)
            {
                $jobFaker=Faker\Factory::create();
                $job=new Job();
                $job->setCategory($category);
                $job->setType('full-time');
                $job->setCompany($jobFaker->company);
                $job->setLogo('sensio-labs.gif');
                $job->setPosition(implode(' ',$jobFaker->words(2)));
                $job->setUrl($jobFaker->url);
                $job->setLocation($jobFaker->city.', '.$jobFaker->country);
                $job->setDescription($jobFaker->paragraph);
                $job->setHowToApply($jobFaker->sentence);
                $job->setIsPublic(true);
                $job->setIsActive(true);
                $job->setToken(implode('-',$jobFaker->words(3)));
                $job->setEmail($jobFaker->email);
                $time=date('Y-m-d H:i:s', strtotime('+'.mt_rand(0,30).' days'.mt_rand(0,24).' hours'.mt_rand(0,60).' minutes'));
                $job->setExpiresAt(new \DateTime($time));
                $job->setCreatedAt(new \DateTime());
                $em->persist($job);
            }
            $em->flush();
        }
        exit;
    }
}
