<?php

namespace Nosun\ReplyToSee;

class HideContentInPosts extends FormatContent
{
    public function __invoke($serializer, $model, $attributes)
    {
        if (isset($attributes["contentHtml"])) {

            $newHTML = $attributes["contentHtml"];
            if (strpos($newHTML, '<login2see>') === false){

                return $attributes;
            }

            $isStartPost = $model['discussion']->first_post_id == $model->id;

            if (!$isStartPost) {
                $newHTML = preg_replace('/<login2see>(.*?)<\/login2see>/is', '<div>$1</div>', $newHTML);
                $attributes['contentHtml'] = $newHTML;
                return $attributes;
            }

            $usersModel = $model['discussion']->participants()->get('id');
            $users = [];

            foreach ($usersModel as $user) {
                $users[] = $user->id;
            }

            $replied = !$serializer->getActor()->isGuest() && in_array($serializer->getActor()->id, $users);

            if ($replied)
                $newHTML = preg_replace('/<login2see>(.*?)<\/login2see>/is', '<div class="login2see"><div class="login2see_title">' . $this->translator->trans('nhanchaukp-login2see.forum.hidden_content') . '</div>$1</div>', $newHTML);
            else
                $newHTML = preg_replace('/<login2see>(.*?)<\/login2see>/is', '<div class="login2see"><div class="login2see_alert">' . $this->translator->trans('nhanchaukp-login2see.forum.login_to_see', array('{login}' => '<a class="login2see_login">' . $this->translator->trans('core.ref.log_in') . '</a>')) . '</div></div>', $newHTML);

            $attributes['contentHtml'] = $newHTML;
        }

        return $attributes;
    }

}
