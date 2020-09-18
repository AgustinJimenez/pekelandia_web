<?php namespace Modules\Newsletter\Sidebar;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Contracts\Authentication;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('Newsletter'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('E-mails enviados'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    //$item->append('admin.newsletter.emails.create');
                    $item->route('admin.newsletter.emails.emailsEnviados');
                    $item->authorize(
                        $this->auth->hasAccess('newsletter.emails.index')
                    );
                });
                $item->item(trans('Enviar e-mail individual'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    //$item->append('admin.newsletter.emails.create');
                    $item->route('admin.newsletter.emails.createEmail');
                    $item->authorize(
                        $this->auth->hasAccess('newsletter.emails.index')
                    );
                });
                $item->item(trans('Enviar e-mail a grupo'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    //$item->append('admin.newsletter.emails.create');
                    $item->route('admin.newsletter.emails.createEmailGrupo');
                    $item->authorize(
                        $this->auth->hasAccess('newsletter.emails.index')
                    );
                });
                $item->item(trans('Lista de e-mails'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.newsletter.emails.create');
                    $item->route('admin.newsletter.emails.index');
                    $item->authorize(
                        $this->auth->hasAccess('newsletter.emails.index')
                    );
                });
                $item->item(trans('Grupos de e-mails'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.newsletter.grupos.create');
                    $item->route('admin.newsletter.grupos.index');
                    $item->authorize(
                        $this->auth->hasAccess('newsletter.grupos.index')
                    );
                });
// append


            });
        });

        return $menu;
    }
}
