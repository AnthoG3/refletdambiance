<?php


namespace App\Controller\Admin;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Routing\Attribute\Route;

class AdminContactController extends AbstractController
{
#[Route('/', name: 'app_home', methods: ['GET', 'POST'])]
public function home(Request $request, MailerInterface $mailer): Response
{
$contact = new Contact();
$form = $this->createForm(ContactType::class, $contact);
$form->handleRequest($request);

if ($form->isSubmitted() && $form->isValid()) {
// Créez le contenu de l'email
$emailContent = $this->renderView('contact/template.twig.html', [
'contact' => $contact,
]);

// Créez l'objet Email
    $email = (new Email())
        ->from('contact@refletdambiance.fr')
        ->to('anthony.gevers@lapiscine.pro')
        ->subject('Une demande de contact a été faite')
        ->html($emailContent);


$mailer->send($email);

$this->addFlash('success', 'Message envoyé avec succès !');
return $this->redirectToRoute('app_home');
}

return $this->render('home.html.twig', [
'form' => $form->createView()
]);
}
}
