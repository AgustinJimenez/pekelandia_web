<?php namespace Modules\Anuncios\Sidebar;

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
            $group->item(trans('Anuncios'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('anuncios::anuncios.title.anuncios'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.anuncios.anuncios.create');
                    $item->route('admin.anuncios.anuncios.index');
                    $item->authorize(
                        $this->auth->hasAccess('anuncios.anuncios.index')
                    );
                });
                $item->item(trans('anuncios::galerias.title.galerias'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.anuncios.galeria.create');
                    $item->route('admin.anuncios.galeria.index');
                    $item->authorize(
                        $this->auth->hasAccess('anuncios.galerias.index')
                    );
                });
                $item->item(trans('anuncios::publicidads.title.publicidads'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.anuncios.publicidad.create');
                    $item->route('admin.anuncios.publicidad.index');
                    $item->authorize(
                        $this->auth->hasAccess('anuncios.publicidads.index')
                    );
                });
                $item->item(trans('anuncios::suscriptores.title.suscriptores'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.anuncios.suscriptores.create');
                    $item->route('admin.anuncios.suscriptores.index');
                    $item->authorize(
                        $this->auth->hasAccess('anuncios.suscriptores.index')
                    );
                });
// append




            });
        });

        return $menu;
    }
}
