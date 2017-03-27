<?php
class Team_Kwc_Team_Member_Data_Vcard_Trl_ContentSender extends Team_Kwc_Team_Member_Data_Vcard_ContentSender
{
    public function sendContent($includeMaster)
    {
        $dataRow = $this->_data->chained->parent->getComponent()->getRow()->toArray();
        $dataRow = (object)array_merge($dataRow, $this->_data->parent->getComponent()->getRow()->toArray());
        $imageData = $this->_data->chained->parent->parent->getChildComponent('-image');
        $this->_outputVcard($dataRow, $imageData);
    }

    /**
     * Set default vCard settings here or in Team_Component
     */
    protected function _getDefaultValues()
    {
        $teamComponent = $this->_data->chained->parent->parent->parent;
        if (Kwc_Abstract::hasSetting($teamComponent->componentClass, 'defaultVcardValues')) {
            $setting = Kwc_Abstract::getSetting($teamComponent->componentClass, 'defaultVcardValues');
        }

        if (isset($setting)) {
            return $setting;
        } else {
            return Kwc_Abstract::getSetting($this->_data->chained->componentClass, 'defaultVcardValues');
        }
    }
}
