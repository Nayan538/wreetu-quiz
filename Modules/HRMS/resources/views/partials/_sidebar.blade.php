  {{-- hrm & payroll --}}
  @if (hasPermission('hrm.*'))
  <li class="has-child {{ request()->routeIs('hrm.*') ? 'open' : '' }}">
      <a href="#" class="{{ request()->routeIs('hrm.*') ? 'active' : '' }}">
          <span class="nav-icon uil uil-briefcase"></span>
          <span class="menu-text">{{ t_('menu.hrm-menu-title') }}</span>
          <span class="toggle-icon"></span>
      </a>
      <ul>
          @if (hasPermission('hrm.employees.*'))
              <li><a href="{{ route('hrm.employees.index') }}"
                      class="{{ request()->routeIs('hrm.employees.index') ? 'active' : '' }}">
                      <span class="nav-icon uil uil-users-alt" style="margin-right: 20px;"></span>
                      {{ t_('menu.employees') }}</a>
              </li>
          @endif
         
          @if (hasPermission('hrm.settings.*') )
              <li class="has-subchild {{ request()->routeIs('hrm.settings.*') ? 'open' : '' }}">
                  <a href="#" class="{{ request()->routeIs('hrm.settings.*')  ? 'active' : '' }}">
                      <span class="nav-icon fa fa-cog"></span>
                      <span class="menu-text">{{ t_('menu.hrm-settings-menu-title') }}</span>
                      <span class="toggle-icon"></span>
                  </a>
                  <ul>
                      @if(hasPermission('hrm.settings.departments.index'))
                          <li><a href="{{ route('hrm.settings.departments.index') }}"
                                  class="{{ request()->routeIs('hrm.settings.departments.*') ? 'active' : '' }}">
                                  <span class="nav-icon nav-icon fas fa-building"
                                      style="margin-right: 21px;"></span>
                                  {{ t_('menu.departments') }}</a>
                          </li>
                      @endif
                      @if(hasPermission('hrm.settings.designations.index'))
                          <li><a href="{{ route('hrm.settings.designations.index') }}"
                                  class="{{ request()->routeIs('hrm.settings.designations.*') ? 'active' : '' }}">
                                  <span class="nav-icon nav-icon fas fa-briefcase"
                                      style="margin-right: 21px;"></span>
                                  {{ t_('menu.designations') }}</a>
                          </li>
                      @endif
                  </ul>
              </li>
          @endif
      </ul>
  </li>
@endif
