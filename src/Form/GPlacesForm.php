<?php
namespace Drupal\gplaces\Form;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
class GPlacesForm extends ConfigFormBase {
    /**
     * {@inheritdoc}
     */
    public function getFormId() {
        return 'gplaces_form';
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(array $form, FormStateInterface $form_state) {
        // Form constructor.
        $form = parent::buildForm($form, $form_state);
        // Default settings.
        $config = $this->config('gplaces.settings');
        // Page title field.
        $form['page_title'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Google Places Results page title:'),
            '#default_value' => $config->get('gplaces.page_title'),
            '#description' => $this->t('Give your Google Places Results page a title.'),
        );
        // Source text field.
        $form['source_text'] = array(
            '#type' => 'textfield',
            '#title' => $this->t('Google Places API Key:'),
            '#default_value' => $config->get('gplaces.google_places_api_key'),
            '#description' => $this->t('This is where you have to put your personal Google Places API key to be able to make search calls.  You can get a key from Google here ......'),
        );
        return $form;
    }
    /**
     * {@inheritdoc}
     */
    public function validateForm(array &$form, FormStateInterface $form_state) {
    }
    /**
     * {@inheritdoc}
     */
    public function submitForm(array &$form, FormStateInterface $form_state) {
        $config = $this->config('gplaces.settings');
        $config->set('gplaces.google_places_api_key', $form_state->getValue('google_places_api_key'));
        $config->set('gplaces.page_title', $form_state->getValue('page_title'));
        $config->save();
        return parent::submitForm($form, $form_state);
    }
    /**
     * {@inheritdoc}
     */
    protected function getEditableConfigNames() {
        return [
            'gplaces.settings',
        ];
    }
}
