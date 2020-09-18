<?php namespace Modules\Paises\Sidebar;

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
/*            $group->item(trans('Paises'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                );
                $item->item(trans('paises::pais.title.pais'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.paises.pais.create');
                    $item->route('admin.paises.pais.index');
                    $item->authorize(
                        $this->auth->hasAccess('paises.pais.index')
                    );
                });
                $item->item(trans('paises::ciudads.title.ciudads'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.paises.ciudad.create');
                    $item->route('admin.paises.ciudad.index');
                    $item->authorize(
                        $this->auth->hasAccess('paises.ciudads.index')
                    );
                });


            });*/
        });

        return $menu;
    }
}
